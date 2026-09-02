<?php
/**
 * a2zbpe admin page footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="a2zbpe-premium-promo">
	<div class="a2zbpe-premium-promo__inner">

		<div class="a2zbpe-premium-promo__header">

			<div class="a2zbpe-premium-promo__eyebrow">
				<span class="a2zbpe-premium-promo__eyebrow-dot"></span>
				<?php esc_html_e( 'A2Z Bulk Price Changer Premium', 'tasbeeh-price-editor' ); ?>
			</div>

			<h2>
				<?php esc_html_e( 'Your store can do more.', 'tasbeeh-price-editor' ); ?>
				<span><?php esc_html_e( 'Unlock Premium.', 'tasbeeh-price-editor' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Free gives you the essentials for bulk pricing simple products. Premium removes the limitations that can slow you down when your catalog, pricing needs, or workload grows.',
					'tasbeeh-price-editor'
				);
				?>
			</p>

		</div>

		<div class="a2zbpe-premium-promo__comparison">

			<div class="a2zbpe-premium-promo__plan a2zbpe-premium-promo__plan--free">

				<div class="a2zbpe-premium-promo__plan-head">

					<div>
						<span class="a2zbpe-premium-promo__plan-label">
							<?php esc_html_e( 'WHAT YOU MAY BE MISSING', 'tasbeeh-price-editor' ); ?>
						</span>

						<h3>
							<?php esc_html_e( 'Free', 'tasbeeh-price-editor' ); ?>
						</h3>
					</div>

					<span class="a2zbpe-premium-promo__status-badge">
						<?php esc_html_e( 'CURRENT', 'tasbeeh-price-editor' ); ?>
					</span>

				</div>

				<p class="a2zbpe-premium-promo__plan-description">
					<?php
					esc_html_e(
						'Great for straightforward bulk pricing, but some workflows remain outside the Free version.',
						'tasbeeh-price-editor'
					);
					?>
				</p>

				<div class="a2zbpe-premium-promo__missing-list">

					<div class="a2zbpe-premium-promo__missing">

						<div class="a2zbpe-premium-promo__missing-icon" aria-hidden="true">
							<span class="dashicons dashicons-no-alt"></span>
						</div>

						<div>
							<strong>
								<?php esc_html_e( 'Finding a particular product can take longer', 'tasbeeh-price-editor' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'When you need to update one product quickly, working without product search can mean spending extra time locating it through filters.',
									'tasbeeh-price-editor'
								);
								?>
							</p>
						</div>

					</div>

					<div class="a2zbpe-premium-promo__missing">

						<div class="a2zbpe-premium-promo__missing-icon" aria-hidden="true">
							<span class="dashicons dashicons-no-alt"></span>
						</div>

						<div>
							<strong>
								<?php esc_html_e( 'Variation-heavy catalogs remain out of reach', 'tasbeeh-price-editor' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'If your store depends on variable products, the Free version cannot apply bulk pricing changes to those variations.',
									'tasbeeh-price-editor'
								);
								?>
							</p>
						</div>

					</div>

					<div class="a2zbpe-premium-promo__missing">

						<div class="a2zbpe-premium-promo__missing-icon" aria-hidden="true">
							<span class="dashicons dashicons-no-alt"></span>
						</div>

						<div>
							<strong>
								<?php esc_html_e( 'Small individual corrections can interrupt your workflow', 'tasbeeh-price-editor' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'For a quick one-product adjustment, you may need to leave the bulk pricing workflow and use the standard WooCommerce product editor.',
									'tasbeeh-price-editor'
								);
								?>
							</p>
						</div>

					</div>

					<div class="a2zbpe-premium-promo__missing">

						<div class="a2zbpe-premium-promo__missing-icon" aria-hidden="true">
							<span class="dashicons dashicons-no-alt"></span>
						</div>

						<div>
							<strong>
								<?php esc_html_e( 'Complex pricing changes can require more manual work', 'tasbeeh-price-editor' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'Fixed-amount adjustments are useful for simple changes, but more advanced pricing situations may require additional manual steps.',
									'tasbeeh-price-editor'
								);
								?>
							</p>
						</div>

					</div>

					<div class="a2zbpe-premium-promo__missing">

						<div class="a2zbpe-premium-promo__missing-icon" aria-hidden="true">
							<span class="dashicons dashicons-no-alt"></span>
						</div>

						<div>
							<strong>
								<?php esc_html_e( 'Less flexibility when pricing workflows become more demanding', 'tasbeeh-price-editor' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'As your pricing operations become more sophisticated, the Free version provides fewer ways to customize how changes are configured and applied.',
									'tasbeeh-price-editor'
								);
								?>
							</p>
						</div>

					</div>

				</div>

			</div>

			<div class="a2zbpe-premium-promo__divider" aria-hidden="true">

				<span class="a2zbpe-premium-promo__divider-line"></span>

				<span class="a2zbpe-premium-promo__divider-icon">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 48 48"
						fill="none"
						stroke="currentColor"
						stroke-width="2"
						stroke-linecap="round"
						stroke-linejoin="round"
					>
						<path d="M18 10L32 24L18 38" />
					</svg>
				</span>

				<span class="a2zbpe-premium-promo__divider-line"></span>

			</div>

			<div class="a2zbpe-premium-promo__plan a2zbpe-premium-promo__plan--premium">

				<div class="a2zbpe-premium-promo__premium-badge">
					<span class="dashicons dashicons-star-filled"></span>
					<?php esc_html_e( 'PREMIUM', 'tasbeeh-price-editor' ); ?>
				</div>

				<div class="a2zbpe-premium-promo__plan-head">

					<div>
						<span class="a2zbpe-premium-promo__plan-label">
							<?php esc_html_e( 'UNLOCK MORE', 'tasbeeh-price-editor' ); ?>
						</span>

						<h3>
							<?php esc_html_e( 'Premium', 'tasbeeh-price-editor' ); ?>
						</h3>
					</div>

				</div>

				<p class="a2zbpe-premium-promo__plan-description">
					<?php
					esc_html_e(
						'More powerful tools for faster product management and greater control over your pricing workflow.',
						'tasbeeh-price-editor'
					);
					?>
				</p>

				<div class="a2zbpe-premium-promo__features">

					<details class="a2zbpe-premium-promo__feature">
						<summary>

							<span class="a2zbpe-premium-promo__feature-main">

								<span class="a2zbpe-premium-promo__feature-icon">
									<span class="dashicons dashicons-search"></span>
								</span>

								<span class="a2zbpe-premium-promo__feature-text">
									<strong>
										<?php esc_html_e( 'Product search', 'tasbeeh-price-editor' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Find products faster when every second matters.', 'tasbeeh-price-editor' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Search directly for products instead of relying only on filters. This can make urgent pricing corrections much faster, especially when working with a large catalog.',
								'tasbeeh-price-editor'
							);
							?>
						</p>

					</details>

					<details class="a2zbpe-premium-promo__feature">
						<summary>

							<span class="a2zbpe-premium-promo__feature-main">

								<span class="a2zbpe-premium-promo__feature-icon">
									<span class="dashicons dashicons-products"></span>
								</span>

								<span class="a2zbpe-premium-promo__feature-text">
									<strong>
										<?php esc_html_e( 'Variable product support', 'tasbeeh-price-editor' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Go beyond simple products as your catalog grows.', 'tasbeeh-price-editor' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Extend bulk pricing workflows to WooCommerce variable products, giving stores with variations more room to manage their catalog efficiently.',
								'tasbeeh-price-editor'
							);
							?>
						</p>

					</details>

					<details class="a2zbpe-premium-promo__feature">
						<summary>

							<span class="a2zbpe-premium-promo__feature-main">

								<span class="a2zbpe-premium-promo__feature-icon">
									<span class="dashicons dashicons-edit"></span>
								</span>

								<span class="a2zbpe-premium-promo__feature-text">
									<strong>
										<?php esc_html_e( 'Quick product editing', 'tasbeeh-price-editor' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Make individual corrections without leaving your workflow.', 'tasbeeh-price-editor' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Quickly adjust an individual product without opening the standard WooCommerce product editor, helping you handle small corrections with fewer interruptions.',
								'tasbeeh-price-editor'
							);
							?>
						</p>

					</details>

					<details class="a2zbpe-premium-promo__feature">
						<summary>

							<span class="a2zbpe-premium-promo__feature-main">

								<span class="a2zbpe-premium-promo__feature-icon">
									<span class="dashicons dashicons-chart-area"></span>
								</span>

								<span class="a2zbpe-premium-promo__feature-text">
									<strong>
										<?php esc_html_e( 'Advanced pricing rules', 'tasbeeh-price-editor' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Handle pricing scenarios beyond basic adjustments.', 'tasbeeh-price-editor' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Use more advanced pricing rules when a simple fixed-amount increase or decrease is not enough for the pricing operation you need to perform.',
								'tasbeeh-price-editor'
							);
							?>
						</p>

					</details>

					<details class="a2zbpe-premium-promo__feature">
						<summary>

							<span class="a2zbpe-premium-promo__feature-main">

								<span class="a2zbpe-premium-promo__feature-icon">
									<span class="dashicons dashicons-admin-generic"></span>
								</span>

								<span class="a2zbpe-premium-promo__feature-text">
									<strong>
										<?php esc_html_e( 'More flexible pricing controls', 'tasbeeh-price-editor' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Get more control over how pricing changes are applied.', 'tasbeeh-price-editor' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Configure and apply pricing changes with additional flexibility, giving you more control as your pricing workflow becomes more advanced.',
								'tasbeeh-price-editor'
							);
							?>
						</p>

					</details>

				</div>

			</div>

		</div>

		<div class="a2zbpe-premium-promo__footer">

			<div class="a2zbpe-premium-promo__message">

				<strong>
					<?php
					esc_html_e(
						'Ready to remove the limitations?',
						'tasbeeh-price-editor'
					);
					?>
				</strong>

				<span>
					<?php
					esc_html_e(
						'Explore A2Z Bulk Price Changer Premium and take control of more of your WooCommerce pricing workflow.',
						'tasbeeh-price-editor'
					);
					?>
				</span>

			</div>

			<a
				class="a2zbpe-premium-promo__button"
				href="https://a2zwoosolutions.com/a2z-bulk-price-changer-premium/"
				target="_blank"
				rel="noopener noreferrer"
			>
				<?php esc_html_e( 'Explore Premium', 'tasbeeh-price-editor' ); ?>

				<span class="dashicons dashicons-arrow-right-alt2"></span>
			</a>

		</div>

	</div>
</div>