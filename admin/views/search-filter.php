<?php
/**
 * a2zbpe search and filter interface.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$a2zbpe_filter_options = a2zbpe_get_filter_options();

/*
 * WooCommerce product statuses.
 *
 * wc_get_product_statuses() is the preferred source.
 * The fallback exists because this view may be rendered
 * before WooCommerce exposes that helper function.
 */
$a2zbpe_statuses = array();

if ( function_exists( 'wc_get_product_statuses' ) ) {

	$a2zbpe_statuses = wc_get_product_statuses();

}

/*
 * Fallback product statuses.
 *
 * Keep this list aligned with the statuses accepted
 * by the product API.
 */
if ( empty( $a2zbpe_statuses ) ) {

	$a2zbpe_statuses = array(
		'publish' => __( 'Published', 'a2z-bulk-price-changer-free' ),
		'draft'   => __( 'Draft', 'a2z-bulk-price-changer-free' ),
		'pending' => __( 'Pending Review', 'a2z-bulk-price-changer-free' ),
		'private' => __( 'Private', 'a2z-bulk-price-changer-free' ),
	);

}
?>

<div class="a2zbpe-controls">

	<div class="a2zbpe-filter-section">

		<form id="a2zbpe-filter-form">

			<div class="a2zbpe-filter-grid">

				<div class="a2zbpe-filter-field">

					<label for="a2zbpe-category">
						<?php esc_html_e( 'Category', 'a2z-bulk-price-changer-free' ); ?>
					</label>

					<select
						id="a2zbpe-category"
						name="category"
					>

						<option value="">
							<?php esc_html_e( 'All Categories', 'a2z-bulk-price-changer-free' ); ?>
						</option>

						<?php
						if ( ! empty( $a2zbpe_filter_options['categories'] ) ) :

							foreach ( $a2zbpe_filter_options['categories'] as $a2zbpe_category ) :
								?>

								<option
									value="<?php echo esc_attr( $a2zbpe_category->term_id ); ?>"
								>
									<?php echo esc_html( $a2zbpe_category->name ); ?>
								</option>

								<?php
							endforeach;

						endif;
						?>

					</select>

				</div>


				<div class="a2zbpe-filter-field">

					<label for="a2zbpe-stock-status">
						<?php esc_html_e( 'Stock Status', 'a2z-bulk-price-changer-free' ); ?>
					</label>

					<select
						id="a2zbpe-stock-status"
						name="stock_status"
					>

						<option value="">
							<?php esc_html_e( 'All Stock Statuses', 'a2z-bulk-price-changer-free' ); ?>
						</option>

						<?php
						if ( ! empty( $a2zbpe_filter_options['stock_statuses'] ) ) :

							foreach ( $a2zbpe_filter_options['stock_statuses'] as $a2zbpe_status_key => $a2zbpe_status_name ) :
								?>

								<option
									value="<?php echo esc_attr( $a2zbpe_status_key ); ?>"
								>
									<?php echo esc_html( $a2zbpe_status_name ); ?>
								</option>

								<?php
							endforeach;

						endif;
						?>

					</select>

				</div>


				<div class="a2zbpe-filter-field">

					<label for="a2zbpe-status">
						<?php esc_html_e( 'Product Status', 'a2z-bulk-price-changer-free' ); ?>
					</label>

					<select
						id="a2zbpe-status"
						name="status"
					>

						<option value="">
							<?php esc_html_e( 'All Statuses', 'a2z-bulk-price-changer-free' ); ?>
						</option>

						<?php
						foreach ( $a2zbpe_statuses as $a2zbpe_status_key => $a2zbpe_status_name ) :
							?>

							<option
								value="<?php echo esc_attr( $a2zbpe_status_key ); ?>"
							>
								<?php echo esc_html( $a2zbpe_status_name ); ?>
							</option>

							<?php
						endforeach;
						?>

					</select>

				</div>

			</div>

		</form>

	</div>


	<div class="a2zbpe-controls-actions">

		<div class="a2zbpe-filter-actions">

			<button
				type="submit"
				form="a2zbpe-filter-form"
				class="button button-primary"
				id="a2zbpe-apply-filters"
				disabled
			>
				<?php esc_html_e( 'Apply Filters', 'a2z-bulk-price-changer-free' ); ?>
			</button>

			<button
				type="button"
				id="a2zbpe-reset-filters"
				class="button"
			>
				<?php esc_html_e( 'Reset', 'a2z-bulk-price-changer-free' ); ?>
			</button>

		</div>

	</div>

</div>


<script>
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
</script>