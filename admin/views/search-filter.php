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
		'publish' => __( 'Published', 'tasbeeh-price-editor' ),
		'draft'   => __( 'Draft', 'tasbeeh-price-editor' ),
		'pending' => __( 'Pending Review', 'tasbeeh-price-editor' ),
		'private' => __( 'Private', 'tasbeeh-price-editor' ),
	);

}
?>

<div class="a2zbpe-controls">

	<div class="a2zbpe-filter-section">

		<form id="a2zbpe-filter-form">

			<div class="a2zbpe-filter-grid">

				<div class="a2zbpe-filter-field">

					<label for="a2zbpe-category">
						<?php esc_html_e( 'Category', 'tasbeeh-price-editor' ); ?>
					</label>

					<select
						id="a2zbpe-category"
						name="category"
					>

						<option value="">
							<?php esc_html_e( 'All Categories', 'tasbeeh-price-editor' ); ?>
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
						<?php esc_html_e( 'Stock Status', 'tasbeeh-price-editor' ); ?>
					</label>

					<select
						id="a2zbpe-stock-status"
						name="stock_status"
					>

						<option value="">
							<?php esc_html_e( 'All Stock Statuses', 'tasbeeh-price-editor' ); ?>
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
						<?php esc_html_e( 'Product Status', 'tasbeeh-price-editor' ); ?>
					</label>

					<select
						id="a2zbpe-status"
						name="status"
					>

						<option value="">
							<?php esc_html_e( 'All Statuses', 'tasbeeh-price-editor' ); ?>
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
				<?php esc_html_e( 'Apply Filters', 'tasbeeh-price-editor' ); ?>
			</button>

			<button
				type="button"
				id="a2zbpe-reset-filters"
				class="button"
			>
				<?php esc_html_e( 'Reset', 'tasbeeh-price-editor' ); ?>
			</button>

		</div>

	</div>

</div>