jQuery(document).ready(function ($) {

	'use strict';

	var filterRequest = null;


	/**
	 * Apply filters.
	 */
	$(document).on(
		'submit',
		'#a2zbpe-filter-form',
		function (event) {

			event.preventDefault();

			a2zbpe_apply_filters();

		}
	);


	/**
	 * Apply the currently selected filters.
	 */
	function a2zbpe_apply_filters() {

		var filters = {
			category: $('#a2zbpe-category').val(),
			stock_status: $('#a2zbpe-stock-status').val(),
			status: $('#a2zbpe-status').val()
		};


		/*
		 * Clear the current results before loading the new filtered result set.
		 */
		a2zbpe_reset_results();


		/*
		 * Send the selected filters to the server.
		 */
		a2zbpe_filter_products(filters);

	}


	/**
	 * Filter products.
	 */
	function a2zbpe_filter_products(filters) {

		/*
		 * Abort an existing filter request.
		 */
		if (filterRequest) {

			filterRequest.abort();

			filterRequest = null;

		}


		a2zbpe_show_loading();


		filterRequest = $.ajax({

			url: a2zbpeAdmin.ajaxUrl,

			type: 'POST',

			data: {
				action: 'a2zbpe_filter_products',
				nonce: a2zbpeAdmin.nonce,

				category: filters.category,
				stock_status: filters.stock_status,
				status: filters.status
			},


			success: function (response) {

				if (!response || !response.success) {

					a2zbpe_show_filter_error(
						response &&
						response.data &&
						response.data.message
							? response.data.message
							: 'Unable to load products.'
					);

					return;
				}


				a2zbpe_render_products(
					response.data.products || []
				);

			},


			error: function (xhr, status) {

				if ('abort' === status) {
					return;
				}


				var message =
					'Unable to load products.';


				if (
					xhr.responseJSON &&
					xhr.responseJSON.data &&
					xhr.responseJSON.data.message
				) {

					message =
						xhr.responseJSON.data.message;

				}


				a2zbpe_show_filter_error(
					message
				);

			},


			complete: function () {

				filterRequest = null;

			}

		});

	}


	/**
	 * Reset current product results.
	 */
	function a2zbpe_reset_results() {

		/*
		 * Abort pending filter request.
		 */
		if (filterRequest) {

			filterRequest.abort();

			filterRequest = null;

		}


		/*
		 * Clear the Bulk Edit table.
		 */
		$('#a2zbpe-bulk-products').empty();


		/*
		 * Reset the select-all checkbox.
		 */
		$('#a2zbpe-select-all')
			.prop('checked', false)
			.prop('indeterminate', false);


		/*
		 * Reset the selected product count.
		 */
		$('#a2zbpe-bulk-selected-count').text('0');


		/*
		 * Clear any previous result message.
		 */
		$('#a2zbpe-bulk-result')
			.empty()
			.prop('hidden', true);

	}


	/**
	 * Reset filters and results.
	 */
	$(document).on(
		'click',
		'#a2zbpe-reset-filters',
		function (event) {

			event.preventDefault();


			/*
			 * Reset the three filter controls.
			 */
			var form = $('#a2zbpe-filter-form')[0];

			if (form) {
				form.reset();
			}


			/*
			 * Clear displayed products.
			 */
			a2zbpe_reset_results();

		}
	);


	/**
	 * Render Bulk Edit product table.
	 *
	 * The API already returns simple products only.
	 * No product-type filtering is necessary here.
	 */
	function a2zbpe_render_products(products) {

		var $body = $('#a2zbpe-bulk-products');

		$body.empty();


		if (!$.isArray(products) || !products.length) {

			$body.append(
				$('<tr>').append(
					$('<td>', {
						colspan: 5,
						class: 'a2zbpe-no-products',
						text: 'No products found.'
					})
				)
			);

			return;
		}


		$.each(
			products,
			function (index, product) {

				/*
				 * only render simple products.
				 *
				 * The API already restricts the query
				 * to simple products.
				 */
				if (
					! product ||
					'simple' !== product.type
				) {

					return;

				}


				var $row = $('<tr>', {
					'data-product-id': product.id
				});


				/*
				 * Selection checkbox.
				 */
				var $checkbox = $('<input>', {
					type: 'checkbox',
					class: 'a2zbpe-product-checkbox',
					value: product.id
				});


				$row.append(
					$('<td>', {
						class: 'check-column'
					}).append(
						$checkbox
					)
				);


				/*
				 * Product.
				 */
				$row.append(
					a2zbpe_product_cell(product)
				);


				/*
				 * Status.
				 */
				$row.append(
					$('<td>', {
						text: product.status_label
					})
				);


				/*
				 * Stock.
				 */
				$row.append(
					a2zbpe_stock_cell(product)
				);


				/*
				 * Price.
				 */
				$row.append(
					a2zbpe_price_cell(product)
				);


				$body.append($row);

			}
		);


		/*
		 * Make sure the select-all state is correct after rendering.
		 */
		if (
			typeof a2zbpe_update_bulk_selection ===
			'function'
		) {

			a2zbpe_update_bulk_selection();

		}

	}


	/**
	 * Product cell.
	 *
	 * @param {Object} product Product.
	 * @return {jQuery} Product cell.
	 */
	function a2zbpe_product_cell(product) {

		var $cell = $('<td>', {
			class: 'a2zbpe-product-cell'
		});


		var $image = $('<img>', {
			src: product.image,
			alt: product.name,
			class: 'a2zbpe-product-image'
		});


		var $name = $('<span>', {
			class: 'a2zbpe-product-name',
			text: product.name
		});


		$cell
			.append($image)
			.append($name);


		return $cell;

	}


	/**
	 * Stock cell.
	 *
	 * @param {Object} product Product.
	 * @return {jQuery} Stock cell.
	 */
	function a2zbpe_stock_cell(product) {

		var stockText = product.stock_label;


		if (
			product.manage_stock &&
			null !== product.stock_quantity
		) {

			stockText +=
				' (' +
				product.stock_quantity +
				')';

		}


		return $('<td>', {
			text: stockText
		});

	}


	/**
	 * Price cell.
	 *
	 * @param {Object} product Product.
	 * @return {jQuery} Price cell.
	 */
	function a2zbpe_price_cell(product) {

		var $cell = $('<td>', {
			class: 'a2zbpe-price-cell'
		});


		/*
		 * Regular price.
		 */
		if ('' !== product.regular_price) {

			$cell.append(
				$('<div>', {
					class: 'a2zbpe-regular-price',
					text:
						'Regular: ' +
						product.regular_price
				})
			);

		}


		/*
		 * Sale price.
		 */
		if ('' !== product.sale_price) {

			$cell.append(
				$('<div>', {
					class: 'a2zbpe-sale-price',
					text:
						'Sale: ' +
						product.sale_price
				})
			);

		}


		/*
		 * Product has no price.
		 */
		if (
			'' === product.regular_price &&
			'' === product.sale_price
		) {

			$cell.text('—');

		}


		return $cell;

	}


	/**
	 * Show filter/AJAX error.
	 *
	 * @param {string} message Error message.
	 */
	function a2zbpe_show_filter_error(message) {

		$('#a2zbpe-bulk-products').html(
			$('<tr>').append(
				$('<td>', {
					colspan: 5,
					class: 'a2zbpe-filter-result-error',
					text: message
				})
			)
		);

	}


	/**
	 * Show Bulk Edit table loading state.
	 */
	function a2zbpe_show_loading() {

		$('#a2zbpe-bulk-products').html(
			$('<tr>').append(
				$('<td>', {
					colspan: 5,
					class: 'a2zbpe-loading',
					text: 'Loading products...'
				})
			)
		);

	}

});