jQuery(document).ready(function ($) {

	'use strict';


	/**
	 * Get the current filter state.
	 *
	 * All three filters are required before
	 * the user can perform a filter operation.
	 *
	 * @return {boolean}
	 */
	function a2zbpe_filters_are_complete() {

		var category = $.trim(
			$('#a2zbpe-category').val() || ''
		);

		var stockStatus = $.trim(
			$('#a2zbpe-stock-status').val() || ''
		);

		var status = $.trim(
			$('#a2zbpe-status').val() || ''
		);


		return (
			'' !== category &&
			'' !== stockStatus &&
			'' !== status
		);

	}


	/**
	 * Update the Apply Filters button.
	 *
	 * The button remains disabled until all
	 * three filters have been configured.
	 */
	function a2zbpe_update_filter_button() {

		var isComplete =
			a2zbpe_filters_are_complete();


		$('#a2zbpe-apply-filters').prop(
			'disabled',
			!isComplete
		);


		/*
		 * Give the user a useful native tooltip
		 * while the button is disabled.
		 */
		if (!isComplete) {

			$('#a2zbpe-apply-filters').attr(
				'title',
				'Select a category, stock status, and product status.'
			);

		} else {

			$('#a2zbpe-apply-filters').removeAttr(
				'title'
			);

		}

	}


	/**
	 * Update the button whenever a filter changes.
	 */
	$(document).on(
		'change',
		'#a2zbpe-category, #a2zbpe-stock-status, #a2zbpe-status',
		function () {

			a2zbpe_update_filter_button();

		}
	);


	/**
	 * Prevent incomplete user-submitted filtering.
	 *
	 * This is an additional safety layer beyond
	 * the disabled button state.
	 */
	$(document).on(
		'submit',
		'#a2zbpe-filter-form',
		function (event) {

			/*
			 * A programmatic submit triggered internally
			 * after bulk pricing is allowed to proceed.
			 *
			 * User-initiated filtering must contain all
			 * three filter values.
			 */
			if (
				event.originalEvent &&
				!a2zbpe_filters_are_complete()
			) {

				event.preventDefault();

				a2zbpe_update_filter_button();

				return false;
			}

		}
	);


	/**
	 * Reset the UI state after the existing reset
	 * handler clears the actual form.
	 */
	$(document).on(
		'click',
		'#a2zbpe-reset-filters',
		function () {

			setTimeout(
				function () {

					a2zbpe_update_filter_button();

				},
				0
			);

		}
	);


	/*
	 * Initialize the button state.
	 */
	a2zbpe_update_filter_button();

});