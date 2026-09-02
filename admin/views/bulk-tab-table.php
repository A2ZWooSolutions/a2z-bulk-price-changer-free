<?php
/**
 * a2zbpe bulk edit table.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="a2zbpe-product-tabs">

<div
	id="a2zbpe-bulk-tab"
	class="a2zbpe-product-tab"
>

	<div class="a2zbpe-tab-content">

		<div class="a2zbpe-bulk-rules">

			<h2>
				<?php esc_html_e( 'Bulk Pricing', 'a2z-bulk-price-changer-free' ); ?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Configure a pricing rule and apply it to the selected simple products.',
					'a2z-bulk-price-changer-free'
				);
				?>
			</p>


			<div class="a2zbpe-bulk-rule" style="display: flex; flex-wrap:wrap; gap: 1rem;">

				<div class="a2zbpe-bulk-field">

					<label for="a2zbpe-bulk-price-type" style="display: flex; flex-direction: column;">
						<?php esc_html_e( 'Price type', 'a2z-bulk-price-changer-free' ); ?>
					</label>

					<select id="a2zbpe-bulk-price-type">

						<option value="regular">
							<?php esc_html_e( 'Regular price', 'a2z-bulk-price-changer-free' ); ?>
						</option>

						<option value="sale">
							<?php esc_html_e( 'Sale price', 'a2z-bulk-price-changer-free' ); ?>
						</option>

						<option value="both">
							<?php esc_html_e( 'Both price', 'a2z-bulk-price-changer-free' ); ?>
						</option>

					</select>

				</div>


				<div class="a2zbpe-bulk-field">

					<label for="a2zbpe-bulk-pricing-method" style="display: flex; flex-direction: column;">
						<?php esc_html_e( 'Pricing rule', 'a2z-bulk-price-changer-free' ); ?>
					</label>

					<select id="a2zbpe-bulk-pricing-method">

						<option value="increase_fixed">
							<?php esc_html_e( 'Increase by fixed amount', 'a2z-bulk-price-changer-free' ); ?>
						</option>

						<option value="decrease_fixed">
							<?php esc_html_e( 'Decrease by fixed amount', 'a2z-bulk-price-changer-free' ); ?>
						</option>

						<option value="set_price">
							<?php esc_html_e( 'Set new price', 'a2z-bulk-price-changer-free' ); ?>
						</option>

					</select>

				</div>


				<div class="a2zbpe-bulk-field">

					<label for="a2zbpe-bulk-pricing-value" style="display: flex; flex-direction: column;">
						<?php esc_html_e( 'Amount', 'a2z-bulk-price-changer-free' ); ?>
					</label>

					<input
						type="number"
						id="a2zbpe-bulk-pricing-value"
						step="0.01"
						min="0"
						placeholder="0.00"
					>

				</div>

			</div>


			<div class="a2zbpe-bulk-actions">

				<span class="a2zbpe-bulk-selected">

					<?php
					esc_html_e(
						'Selected:',
						'a2z-bulk-price-changer-free'
					);
					?>

					<strong id="a2zbpe-bulk-selected-count">0</strong>

				</span>


				<button
					type="button"
					class="button button-primary"
					id="a2zbpe-apply-bulk-pricing"
				>
					<?php
					esc_html_e(
						'Apply to selected products',
						'a2z-bulk-price-changer-free'
					);
					?>
				</button>

			</div>


			<div
				id="a2zbpe-bulk-result"
				class="a2zbpe-bulk-result"
				hidden
			></div>

		</div>


		<div class="a2zbpe-table-wrapper">

			<table class="widefat striped a2zbpe-product-table">

				<thead>

					<tr>

						<th
							class="check-column"
							style="padding:6px 0 20px !important;"
						>

							<input
								style="margin-top:13px;"
								type="checkbox"
								id="a2zbpe-select-all"
							>

						</th>

						<th>
							<?php
							esc_html_e(
								'Product',
								'a2z-bulk-price-changer-free'
							);
							?>
						</th>

						<th>
							<?php
							esc_html_e(
								'Status',
								'a2z-bulk-price-changer-free'
							);
							?>
						</th>

						<th>
							<?php
							esc_html_e(
								'Stock',
								'a2z-bulk-price-changer-free'
							);
							?>
						</th>

						<th>
							<?php
							esc_html_e(
								'Price',
								'a2z-bulk-price-changer-free'
							);
							?>
						</th>

					</tr>

				</thead>

				<tbody id="a2zbpe-bulk-products">

				</tbody>

			</table>

		</div>

	</div>

</div>

</div>
