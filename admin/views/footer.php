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
				<?php esc_html_e( 'A2Z Bulk Price Changer Premium', 'a2z-bulk-price-changer-free' ); ?>
			</div>

			<h2>
				<?php esc_html_e( 'Your store can do more.', 'a2z-bulk-price-changer-free' ); ?>
				<span><?php esc_html_e( 'Unlock Premium.', 'a2z-bulk-price-changer-free' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Free gives you the essentials for bulk pricing simple products. Premium removes the limitations that can slow you down when your catalog, pricing needs, or workload grows.',
					'a2z-bulk-price-changer-free'
				);
				?>
			</p>

		</div>

		<div class="a2zbpe-premium-promo__comparison">

			<div class="a2zbpe-premium-promo__plan a2zbpe-premium-promo__plan--free">

				<div class="a2zbpe-premium-promo__plan-head">

					<div>
						<span class="a2zbpe-premium-promo__plan-label">
							<?php esc_html_e( 'WHAT YOU MAY BE MISSING', 'a2z-bulk-price-changer-free' ); ?>
						</span>

						<h3>
							<?php esc_html_e( 'Free', 'a2z-bulk-price-changer-free' ); ?>
						</h3>
					</div>

					<span class="a2zbpe-premium-promo__status-badge">
						<?php esc_html_e( 'CURRENT', 'a2z-bulk-price-changer-free' ); ?>
					</span>

				</div>

				<p class="a2zbpe-premium-promo__plan-description">
					<?php
					esc_html_e(
						'Great for straightforward bulk pricing, but some workflows remain outside the Free version.',
						'a2z-bulk-price-changer-free'
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
								<?php esc_html_e( 'Finding a particular product can take longer', 'a2z-bulk-price-changer-free' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'When you need to update one product quickly, working without product search can mean spending extra time locating it through filters.',
									'a2z-bulk-price-changer-free'
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
								<?php esc_html_e( 'Variation-heavy catalogs remain out of reach', 'a2z-bulk-price-changer-free' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'If your store depends on variable products, the Free version cannot apply bulk pricing changes to those variations.',
									'a2z-bulk-price-changer-free'
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
								<?php esc_html_e( 'Small individual corrections can interrupt your workflow', 'a2z-bulk-price-changer-free' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'For a quick one-product adjustment, you may need to leave the bulk pricing workflow and use the standard WooCommerce product editor.',
									'a2z-bulk-price-changer-free'
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
								<?php esc_html_e( 'Complex pricing changes can require more manual work', 'a2z-bulk-price-changer-free' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'Fixed-amount adjustments are useful for simple changes, but more advanced pricing situations may require additional manual steps.',
									'a2z-bulk-price-changer-free'
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
								<?php esc_html_e( 'Less flexibility when pricing workflows become more demanding', 'a2z-bulk-price-changer-free' ); ?>
							</strong>

							<p>
								<?php
								esc_html_e(
									'As your pricing operations become more sophisticated, the Free version provides fewer ways to customize how changes are configured and applied.',
									'a2z-bulk-price-changer-free'
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
					<?php esc_html_e( 'PREMIUM', 'a2z-bulk-price-changer-free' ); ?>
				</div>

				<div class="a2zbpe-premium-promo__plan-head">

					<div>
						<span class="a2zbpe-premium-promo__plan-label">
							<?php esc_html_e( 'UNLOCK MORE', 'a2z-bulk-price-changer-free' ); ?>
						</span>

						<h3>
							<?php esc_html_e( 'Premium', 'a2z-bulk-price-changer-free' ); ?>
						</h3>
					</div>

				</div>

				<p class="a2zbpe-premium-promo__plan-description">
					<?php
					esc_html_e(
						'More powerful tools for faster product management and greater control over your pricing workflow.',
						'a2z-bulk-price-changer-free'
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
										<?php esc_html_e( 'Product search', 'a2z-bulk-price-changer-free' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Find products faster when every second matters.', 'a2z-bulk-price-changer-free' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Search directly for products instead of relying only on filters. This can make urgent pricing corrections much faster, especially when working with a large catalog.',
								'a2z-bulk-price-changer-free'
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
										<?php esc_html_e( 'Variable product support', 'a2z-bulk-price-changer-free' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Go beyond simple products as your catalog grows.', 'a2z-bulk-price-changer-free' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Extend bulk pricing workflows to WooCommerce variable products, giving stores with variations more room to manage their catalog efficiently.',
								'a2z-bulk-price-changer-free'
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
										<?php esc_html_e( 'Quick product editing', 'a2z-bulk-price-changer-free' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Make individual corrections without leaving your workflow.', 'a2z-bulk-price-changer-free' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Quickly adjust an individual product without opening the standard WooCommerce product editor, helping you handle small corrections with fewer interruptions.',
								'a2z-bulk-price-changer-free'
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
										<?php esc_html_e( 'Advanced pricing rules', 'a2z-bulk-price-changer-free' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Handle pricing scenarios beyond basic adjustments.', 'a2z-bulk-price-changer-free' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Use more advanced pricing rules when a simple fixed-amount increase or decrease is not enough for the pricing operation you need to perform.',
								'a2z-bulk-price-changer-free'
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
										<?php esc_html_e( 'More flexible pricing controls', 'a2z-bulk-price-changer-free' ); ?>
									</strong>

									<small>
										<?php esc_html_e( 'Get more control over how pricing changes are applied.', 'a2z-bulk-price-changer-free' ); ?>
									</small>
								</span>

							</span>

							<span class="dashicons dashicons-arrow-down-alt2"></span>

						</summary>

						<p>
							<?php
							esc_html_e(
								'Configure and apply pricing changes with additional flexibility, giving you more control as your pricing workflow becomes more advanced.',
								'a2z-bulk-price-changer-free'
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
						'a2z-bulk-price-changer-free'
					);
					?>
				</strong>

				<span>
					<?php
					esc_html_e(
						'Explore A2Z Bulk Price Changer Premium and take control of more of your WooCommerce pricing workflow.',
						'a2z-bulk-price-changer-free'
					);
					?>
				</span>

			</div>

			<a
				class="a2zbpe-premium-promo__button"
				href="https://a2zwoosolutions.com/bulk-price-changer-premium/"
				target="_blank"
				rel="noopener noreferrer"
			>
				<?php esc_html_e( 'Explore Premium', 'a2z-bulk-price-changer-free' ); ?>

				<span class="dashicons dashicons-arrow-right-alt2"></span>
			</a>

		</div>

	</div>
</div>


<style>
	.a2zbpe-premium-promo {
		position: relative;
		width: 100%;
		margin: 48px 0 25px;
		overflow: hidden;
		border: 1px solid #dcdcde;
		border-radius: 20px;
		background: #fff;
		box-shadow:
			0 14px 45px rgba(0, 0, 0, 0.045),
			0 2px 8px rgba(0, 0, 0, 0.025);
	}

	.a2zbpe-premium-promo *,
	.a2zbpe-premium-promo *::before,
	.a2zbpe-premium-promo *::after {
		box-sizing: border-box;
	}

	.a2zbpe-premium-promo__inner {
		position: relative;
		z-index: 1;
		padding: 38px 40px;
	}

	.a2zbpe-premium-promo__header {
		max-width: 760px;
		margin: 0 auto 32px;
		text-align: center;
	}

	.a2zbpe-premium-promo__eyebrow {
		display: inline-flex;
		align-items: center;
		gap: 7px;
		margin-bottom: 13px;
		padding: 7px 11px;
		border: 1px solid #dcdcde;
		border-radius: 999px;
		background: #f6f7f7;
		color: #50575e;
		font-size: 9px;
		font-weight: 700;
		letter-spacing: 0.09em;
		line-height: 1;
		text-transform: uppercase;
	}

	.a2zbpe-premium-promo__eyebrow-dot {
		width: 6px;
		height: 6px;
		border-radius: 50%;
		background: #1d2327;
	}

	.a2zbpe-premium-promo h2 {
		margin: 0 0 11px;
		color: #1d2327;
		font-size: clamp(28px, 3vw, 41px);
		font-weight: 800;
		line-height: 1.08;
		letter-spacing: -0.045em;
	}

	.a2zbpe-premium-promo h2 span {
		color: #646970;
	}

	.a2zbpe-premium-promo__header > p {
		max-width: 690px;
		margin: 0 auto;
		color: #646970;
		font-size: 13px;
		line-height: 1.7;
	}

	.a2zbpe-premium-promo__comparison {
		display: grid;
		grid-template-columns: minmax(0, 1fr) 54px minmax(0, 1fr);
		align-items: stretch;
		max-width: 970px;
		margin: 0 auto;
	}

	.a2zbpe-premium-promo__plan {
		position: relative;
		min-width: 0;
		padding: 25px;
		border: 1px solid #dcdcde;
		border-radius: 17px;
		background: #fff;
	}

	.a2zbpe-premium-promo__plan--free {
		background: #fff;
	}

	.a2zbpe-premium-promo__plan--premium {
		border-color: #1d2327;
		box-shadow:
			0 12px 35px rgba(0, 0, 0, 0.07),
			0 2px 5px rgba(0, 0, 0, 0.025);
	}

	.a2zbpe-premium-promo__plan-head {
		display: flex;
		align-items: flex-start;
		justify-content: space-between;
		gap: 15px;
		margin-bottom: 7px;
	}

	.a2zbpe-premium-promo__plan-label {
		display: block;
		margin-bottom: 4px;
		color: #8c8f94;
		font-size: 8px;
		font-weight: 800;
		letter-spacing: 0.09em;
		line-height: 1.2;
	}

	.a2zbpe-premium-promo__plan h3 {
		margin: 0;
		color: #1d2327;
		font-size: 22px;
		font-weight: 800;
		line-height: 1.2;
		letter-spacing: -0.025em;
	}

	.a2zbpe-premium-promo__status-badge {
		display: inline-flex;
		align-items: center;
		padding: 5px 7px;
		border: 1px solid #dcdcde;
		border-radius: 999px;
		color: #646970;
		font-size: 7px;
		font-weight: 800;
		letter-spacing: 0.08em;
		line-height: 1;
		white-space: nowrap;
	}

	.a2zbpe-premium-promo__plan-description {
		margin: 0 0 18px;
		color: #646970;
		font-size: 10px;
		line-height: 1.6;
	}

	.a2zbpe-premium-promo__premium-badge {
		position: absolute;
		top: -11px;
		right: 18px;
		display: inline-flex;
		align-items: center;
		gap: 4px;
		padding: 5px 9px;
		border-radius: 999px;
		background: #1d2327;
		color: #fff;
		font-size: 8px;
		font-weight: 800;
		letter-spacing: 0.08em;
		line-height: 1;
	}

	.a2zbpe-premium-promo__premium-badge .dashicons {
		width: 12px;
		height: 12px;
		font-size: 12px;
	}

	.a2zbpe-premium-promo__missing-list {
		display: grid;
		gap: 0;
	}

	.a2zbpe-premium-promo__missing {
		display: grid;
		grid-template-columns: 27px minmax(0, 1fr);
		gap: 10px;
		padding: 13px 0;
		border-top: 1px solid #e8e8e8;
	}

	.a2zbpe-premium-promo__missing:last-child {
		border-bottom: 1px solid #e8e8e8;
	}

	.a2zbpe-premium-promo__missing-icon {
		display: grid;
		place-items: center;
		width: 27px;
		height: 27px;
		border: 1px solid #dcdcde;
		border-radius: 50%;
		background: #f6f7f7;
		color: #646970;
	}

	.a2zbpe-premium-promo__missing-icon .dashicons {
		width: 17px;
		height: 17px;
		font-size: 17px;
	}

	.a2zbpe-premium-promo__missing strong {
		display: block;
		margin: 1px 0 4px;
		color: #2c3338;
		font-size: 10.5px;
		font-weight: 700;
		line-height: 1.4;
	}

	.a2zbpe-premium-promo__missing p {
		margin: 0;
		color: #646970;
		font-size: 9.5px;
		line-height: 1.55;
	}

	.a2zbpe-premium-promo__divider {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		gap: 9px;
		padding: 0 8px;
	}

	.a2zbpe-premium-promo__divider-line {
		width: 1px;
		flex: 1;
		min-height: 25px;
		background: #e1e1e1;
	}

	.a2zbpe-premium-promo__divider-icon {
		display: grid;
		place-items: center;
		width: 34px;
		height: 34px;
		border: 1px solid #dcdcde;
		border-radius: 50%;
		background: #fff;
		color: #1d2327;
	}

	.a2zbpe-premium-promo__divider-icon svg {
		width: 21px;
		height: 21px;
	}

	.a2zbpe-premium-promo__features {
		display: grid;
		gap: 0;
	}

	.a2zbpe-premium-promo__feature {
		border-top: 1px solid #e8e8e8;
	}

	.a2zbpe-premium-promo__feature:last-child {
		border-bottom: 1px solid #e8e8e8;
	}

	.a2zbpe-premium-promo__feature summary {
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 12px;
		padding: 12px 0;
		cursor: pointer;
		list-style: none;
		outline: none;
	}

	.a2zbpe-premium-promo__feature summary::-webkit-details-marker {
		display: none;
	}

	.a2zbpe-premium-promo__feature summary > .dashicons {
		flex: 0 0 16px;
		width: 16px;
		height: 16px;
		color: #8c8f94;
		font-size: 16px;
		transition: transform 0.2s ease;
	}

	.a2zbpe-premium-promo__feature[open] summary > .dashicons {
		transform: rotate(180deg);
	}

	.a2zbpe-premium-promo__feature summary:focus-visible {
		outline: 2px solid #8c8f94;
		outline-offset: 3px;
		border-radius: 3px;
	}

	.a2zbpe-premium-promo__feature-main {
		display: flex;
		align-items: center;
		min-width: 0;
		gap: 10px;
	}

	.a2zbpe-premium-promo__feature-icon {
		display: grid;
		place-items: center;
		flex: 0 0 31px;
		width: 31px;
		height: 31px;
		border: 1px solid #dcdcde;
		border-radius: 9px;
		background: #f6f7f7;
		color: #1d2327;
	}

	.a2zbpe-premium-promo__feature-icon .dashicons {
		width: 17px;
		height: 17px;
		font-size: 17px;
	}

	.a2zbpe-premium-promo__feature-text {
		display: block;
		min-width: 0;
	}

	.a2zbpe-premium-promo__feature-text strong {
		display: block;
		color: #2c3338;
		font-size: 10.5px;
		font-weight: 750;
		line-height: 1.35;
	}

	.a2zbpe-premium-promo__feature-text small {
		display: block;
		margin-top: 2px;
		overflow: hidden;
		color: #8c8f94;
		font-size: 8.5px;
		line-height: 1.4;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

	.a2zbpe-premium-promo__feature > p {
		margin: -1px 27px 12px 41px;
		color: #646970;
		font-size: 9.5px;
		line-height: 1.6;
	}

	.a2zbpe-premium-promo__footer {
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 25px;
		max-width: 970px;
		margin: 26px auto 0;
		padding-top: 21px;
		border-top: 1px solid #e8e8e8;
	}

	.a2zbpe-premium-promo__message {
		min-width: 0;
	}

	.a2zbpe-premium-promo__message strong,
	.a2zbpe-premium-promo__message span {
		display: block;
	}

	.a2zbpe-premium-promo__message strong {
		margin-bottom: 3px;
		color: #1d2327;
		font-size: 11px;
		font-weight: 700;
	}

	.a2zbpe-premium-promo__message span {
		color: #8c8f94;
		font-size: 10px;
		line-height: 1.5;
	}

	.a2zbpe-premium-promo__button {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		gap: 6px;
		flex: 0 0 auto;
		min-height: 39px;
		padding: 0 17px;
		border: 1px solid #1d2327;
		border-radius: 9px;
		background: #1d2327;
		color: #fff;
		font-size: 11px;
		font-weight: 700;
		line-height: 1;
		text-decoration: none;
		transition:
			transform 0.2s ease,
			background-color 0.2s ease,
			box-shadow 0.2s ease;
	}

	.a2zbpe-premium-promo__button:hover {
		background: #000;
		color: #fff;
		transform: translateY(-2px);
		box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
	}

	.a2zbpe-premium-promo__button:focus-visible {
		color: #fff;
		outline: 2px solid #8c8f94;
		outline-offset: 2px;
	}

	.a2zbpe-premium-promo__button .dashicons {
		width: 14px;
		height: 14px;
		font-size: 14px;
	}

	@media screen and (max-width: 850px) {

		.a2zbpe-premium-promo__inner {
			padding: 30px 24px;
		}

		.a2zbpe-premium-promo__comparison {
			grid-template-columns: 1fr;
			gap: 15px;
		}

		.a2zbpe-premium-promo__divider {
			flex-direction: row;
			height: 38px;
			padding: 0;
		}

		.a2zbpe-premium-promo__divider-line {
			width: auto;
			height: 1px;
			min-height: 0;
			flex: 1;
		}

		.a2zbpe-premium-promo__divider-icon svg {
			transform: rotate(90deg);
		}

		.a2zbpe-premium-promo__footer {
			align-items: stretch;
			flex-direction: column;
			gap: 15px;
		}

		.a2zbpe-premium-promo__button {
			width: 100%;
		}
	}

	@media screen and (max-width: 520px) {

		.a2zbpe-premium-promo {
			margin-top: 32px;
			border-radius: 16px;
		}

		.a2zbpe-premium-promo__inner {
			padding: 25px 17px;
		}

		.a2zbpe-premium-promo__header {
			margin-bottom: 25px;
		}

		.a2zbpe-premium-promo h2 {
			font-size: 27px;
		}

		.a2zbpe-premium-promo__header > p {
			font-size: 12px;
		}

		.a2zbpe-premium-promo__plan {
			padding: 20px;
		}

		.a2zbpe-premium-promo__plan h3 {
			font-size: 20px;
		}

		.a2zbpe-premium-promo__missing {
			grid-template-columns: 25px minmax(0, 1fr);
			gap: 9px;
			padding: 12px 0;
		}

		.a2zbpe-premium-promo__missing-icon {
			width: 25px;
			height: 25px;
		}

		.a2zbpe-premium-promo__missing strong {
			font-size: 10px;
		}

		.a2zbpe-premium-promo__missing p {
			font-size: 9px;
		}

		.a2zbpe-premium-promo__feature-text small {
			display: none;
		}

		.a2zbpe-premium-promo__feature > p {
			margin-left: 41px;
		}
	}

	@media (prefers-reduced-motion: reduce) {

		.a2zbpe-premium-promo__button,
		.a2zbpe-premium-promo__feature summary > .dashicons {
			transition: none;
		}
	}
</style>