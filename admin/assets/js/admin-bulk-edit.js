jQuery(document).ready(function ($) {

'use strict';

var bulkRequest = null;


/**
 * Update pricing method availability.
 *
 * Set price cannot be used when both price types
 * are selected.
 */
function a2zbpe_update_pricing_method_availability() {

	var priceType = $(
		'#a2zbpe-bulk-price-type'
	).val();


	var $method = $(
		'#a2zbpe-bulk-pricing-method'
	);


	var $setPriceOption = $method.find(
		'option[value="set_price"]'
	);


	if ('both' === priceType) {

		$setPriceOption.prop(
			'disabled',
			true
		);


		/*
		 * Reset the selected method if set price
		 * was selected before switching to both.
		 */
		if ('set_price' === $method.val()) {

			$method.val('');

		}

	} else {

		$setPriceOption.prop(
			'disabled',
			false
		);

	}

}


/**
 * Update pricing method availability when the
 * selected price type changes.
 */
$(document).on(
	'change',
	'#a2zbpe-bulk-price-type',
	function () {

		a2zbpe_update_pricing_method_availability();

	}
);


/*
 * Set the correct initial state.
 */
a2zbpe_update_pricing_method_availability();


/**
 * Select all bulk-edit products.
 */
$(document).on(
	'change',
	'#a2zbpe-select-all',
	function () {

		var checked = $(this).prop('checked');

		$('#a2zbpe-bulk-products')
			.find('.a2zbpe-product-checkbox')
			.prop('checked', checked);

		a2zbpe_update_bulk_selection();

	}
);


/**
 * Individual product selection.
 */
$(document).on(
	'change',
	'#a2zbpe-bulk-products .a2zbpe-product-checkbox',
	function () {

		a2zbpe_update_bulk_selection();

	}
);


/**
 * Update bulk selection state.
 */
function a2zbpe_update_bulk_selection() {

	var $checkboxes = $(
		'#a2zbpe-bulk-products .a2zbpe-product-checkbox'
	);

	var total = $checkboxes.length;

	var selected = $checkboxes.filter(
		':checked'
	).length;


	$('#a2zbpe-select-all').prop(
		'checked',
		total > 0 && selected === total
	);


	$('#a2zbpe-select-all').prop(
		'indeterminate',
		selected > 0 && selected < total
	);


	$('#a2zbpe-bulk-selected-count').text(
		selected
	);

}


/**
 * Apply bulk pricing.
 *
 * Supported price types:
 *
 * - regular
 * - sale
 * - both
 *
 * Supported pricing methods:
 *
 * - increase_fixed
 * - decrease_fixed
 * - set_price
 */
$(document).on(
	'click',
	'#a2zbpe-apply-bulk-pricing',
	function () {

		var $button = $(this);

		var productIds = [];


		/*
		 * Collect selected products.
		 */
		$('#a2zbpe-bulk-products')
			.find('.a2zbpe-product-checkbox:checked')
			.each(function () {

				productIds.push(
					parseInt(
						$(this).val(),
						10
					)
				);

			});


		/*
		 * Validate product selection.
		 */
		if (!productIds.length) {

			a2zbpe_show_bulk_result(
				'error',
				'Please select at least one product.'
			);

			return;
		}


		/*
		 * Get pricing configuration.
		 */
		var priceType = $(
			'#a2zbpe-bulk-price-type'
		).val();

		var method = $(
			'#a2zbpe-bulk-pricing-method'
		).val();

		var value = $(
			'#a2zbpe-bulk-pricing-value'
		).val();


		/*
		 * Validate price type.
		 */
		if (
			'regular' !== priceType &&
			'sale' !== priceType &&
			'both' !== priceType
		) {

			a2zbpe_show_bulk_result(
				'error',
				'Please select a valid price type.'
			);

			return;
		}


		/*
		 * Validate pricing method.
		 */
		if (
			'increase_fixed' !== method &&
			'decrease_fixed' !== method &&
			'set_price' !== method
		) {

			a2zbpe_show_bulk_result(
				'error',
				'Please select a valid pricing rule.'
			);

			return;
		}


		/*
		 * Set price cannot be used with both.
		 *
		 * This is also enforced by PHP.
		 */
		if (
			'both' === priceType &&
			'set_price' === method
		) {

			a2zbpe_show_bulk_result(
				'error',
				'Set price cannot be used when both price types are selected.'
			);

			return;
		}


		/*
		 * Validate pricing value.
		 */
		if ('' === value) {

			a2zbpe_show_bulk_result(
				'error',
				'Please enter a pricing value.'
			);

			return;
		}


		if (isNaN(parseFloat(value))) {

			a2zbpe_show_bulk_result(
				'error',
				'Please enter a valid pricing value.'
			);

			return;
		}


		if (parseFloat(value) < 0) {

			a2zbpe_show_bulk_result(
				'error',
				'Please enter a valid pricing value.'
			);

			return;
		}


		/*
		 * Abort any previous bulk request.
		 */
		if (bulkRequest) {

			bulkRequest.abort();

			bulkRequest = null;

		}


		/*
		 * Disable the button while processing.
		 */
		$button.prop(
			'disabled',
			true
		);


		a2zbpe_show_bulk_result(
			'loading',
			'Applying pricing to selected products...'
		);


		/*
		 * Send bulk pricing request.
		 */
		bulkRequest = $.ajax({

			url: a2zbpeAdmin.ajaxUrl,

			type: 'POST',

			data: {
				action: 'a2zbpe_apply_bulk_pricing',
				nonce: a2zbpeAdmin.nonce,
				product_ids: productIds,
				price_type: priceType,
				method: method,
				value: value
			},


			success: function (response) {

				if (!response.success) {

					a2zbpe_show_bulk_result(
						'error',
						response.data.message ||
						'Unable to apply bulk pricing.'
					);

					return;
				}


				var updated =
					response.data.updated || [];

				var failed =
					response.data.failed || [];


				/*
				 * Render the returned product data.
				 */
				a2zbpe_update_bulk_table_products(
					response.data.products || []
				);


				/*
				 * Display the operation result.
				 */
				a2zbpe_render_bulk_result(
					updated,
					failed
				);


				/*
				 * Refresh the currently filtered
				 * product list.
				 *
				 * This uses the three filters only.
				 */
				$('#a2zbpe-filter-form').trigger(
					'submit'
				);

			},


			error: function (xhr, status) {

				if ('abort' === status) {
					return;
				}


				var message =
					'Unable to apply bulk pricing.';


				/*
				 * Use the server error when available.
				 */
				if (
					xhr.responseJSON &&
					xhr.responseJSON.data &&
					xhr.responseJSON.data.message
				) {

					message =
						xhr.responseJSON.data.message;

				}


				a2zbpe_show_bulk_result(
					'error',
					message
				);

			},


			complete: function () {

				$button.prop(
					'disabled',
					false
				);

				bulkRequest = null;

			}

		});

	}
);


/**
 * Update table rows after bulk pricing.
 *
 * @param {Array} products Updated products.
 */
function a2zbpe_update_bulk_table_products(products) {

	$.each(
		products,
		function (index, product) {

			var $row = $(
				'#a2zbpe-bulk-products'
			).find(
				'tr[data-product-id="' +
				product.id +
				'"]'
			);


			if (!$row.length) {
				return;
			}


			/*
			 * Rebuild only the price cell.
			 */
			var $priceCell = $row.find(
				'.a2zbpe-price-cell'
			);


			if ($priceCell.length) {

				$priceCell.replaceWith(
					a2zbpe_build_bulk_price_cell(
						product
					)
				);

			}

		}
	);

}


/**
 * Build the bulk-edit price cell.
 *
 * @param {Object} product Product.
 * @return {jQuery} Price cell.
 */
function a2zbpe_build_bulk_price_cell(product) {

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
	 * Product has no regular or sale price.
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
 * Render bulk operation result.
 *
 * @param {Array} updated Updated products.
 * @param {Array} failed Failed products.
 */
function a2zbpe_render_bulk_result(
	updated,
	failed
) {

	var $result = $(
		'#a2zbpe-bulk-result'
	);


	$result
		.empty()
		.prop(
			'hidden',
			false
		);


	$result.append(
		$('<p>', {
			text:
				'Updated: ' +
				updated.length +
				' product(s).'
		})
	);


	/*
	 * All products succeeded.
	 */
	if (!failed.length) {

		$result.removeClass(
			'a2zbpe-bulk-result-error'
		);

		$result.addClass(
			'a2zbpe-bulk-result-success'
		);

		return;

	}


	/*
	 * Some products failed.
	 */
	$result.removeClass(
		'a2zbpe-bulk-result-success'
	);

	$result.addClass(
		'a2zbpe-bulk-result-error'
	);


	$result.append(
		$('<p>', {
			text:
				'Could not update ' +
				failed.length +
				' product(s):'
		})
	);


	var $list = $('<ul>');


	$.each(
		failed,
		function (index, item) {

			$list.append(
				$('<li>').append(
					$('<strong>', {
						text: item.name + ': '
					}),
					document.createTextNode(
						item.message
					)
				)
			);

		}
	);


	$result.append(
		$list
	);

}


/**
 * Show a simple bulk result message.
 *
 * @param {string} type Message type.
 * @param {string} message Message.
 */
function a2zbpe_show_bulk_result(
	type,
	message
) {

	var $result = $(
		'#a2zbpe-bulk-result'
	);


	$result
		.removeClass(
			'a2zbpe-bulk-result-success ' +
			'a2zbpe-bulk-result-error ' +
			'a2zbpe-bulk-result-loading'
		)
		.addClass(
			'a2zbpe-bulk-result-' + type
		)
		.text(message)
		.prop(
			'hidden',
			false
		);

}

});
