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
				<?php esc_html_e( 'Bulk Pricing', 'tasbeeh-price-editor' ); ?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Configure a pricing rule and apply it to the selected simple products.',
					'tasbeeh-price-editor'
				);
				?>
			</p>


			<div class="a2zbpe-bulk-rule" style="display: flex; flex-wrap:wrap; gap: 1rem;">

				<div class="a2zbpe-bulk-field">

					<label for="a2zbpe-bulk-price-type" style="display: flex; flex-direction: column;">
						<?php esc_html_e( 'Price type', 'tasbeeh-price-editor' ); ?>
					</label>

					<select id="a2zbpe-bulk-price-type">

						<option value="regular">
							<?php esc_html_e( 'Regular price', 'tasbeeh-price-editor' ); ?>
						</option>

						<option value="sale">
							<?php esc_html_e( 'Sale price', 'tasbeeh-price-editor' ); ?>
						</option>

						<option value="both">
							<?php esc_html_e( 'Both price', 'tasbeeh-price-editor' ); ?>
						</option>

					</select>

				</div>


				<div class="a2zbpe-bulk-field">

					<label for="a2zbpe-bulk-pricing-method" style="display: flex; flex-direction: column;">
						<?php esc_html_e( 'Pricing rule', 'tasbeeh-price-editor' ); ?>
					</label>

					<select id="a2zbpe-bulk-pricing-method">

						<option value="increase_fixed">
							<?php esc_html_e( 'Increase by fixed amount', 'tasbeeh-price-editor' ); ?>
						</option>

						<option value="decrease_fixed">
							<?php esc_html_e( 'Decrease by fixed amount', 'tasbeeh-price-editor' ); ?>
						</option>

						<option value="set_price">
							<?php esc_html_e( 'Set new price', 'tasbeeh-price-editor' ); ?>
						</option>

					</select>

				</div>


				<div class="a2zbpe-bulk-field">

					<label for="a2zbpe-bulk-pricing-value" style="display: flex; flex-direction: column;">
						<?php esc_html_e( 'Amount', 'tasbeeh-price-editor' ); ?>
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
						'tasbeeh-price-editor'
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
						'tasbeeh-price-editor'
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
								'tasbeeh-price-editor'
							);
							?>
						</th>

						<th>
							<?php
							esc_html_e(
								'Status',
								'tasbeeh-price-editor'
							);
							?>
						</th>

						<th>
							<?php
							esc_html_e(
								'Stock',
								'tasbeeh-price-editor'
							);
							?>
						</th>

						<th>
							<?php
							esc_html_e(
								'Price',
								'tasbeeh-price-editor'
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
