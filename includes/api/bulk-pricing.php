<?php
/**
 * a2zbpe bulk pricing API.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Validate a bulk pricing rule.
 * @param array $rule Pricing rule.
 * @return true|WP_Error
 */
function a2zbpe_validate_bulk_pricing_rule( $rule ) {

	if ( ! is_array( $rule ) ) {

		return new WP_Error(
			'invalid_pricing_rule',
			__(
				'Invalid pricing rule.',
				'a2z-bulk-price-changer-free'
			)
		);
	}


	$method = isset( $rule['method'] )
		? sanitize_key( $rule['method'] )
		: '';

	$value = isset( $rule['value'] )
		? wc_format_decimal( $rule['value'] )
		: '';


	/*
	 * A pricing method is required.
	 */
	if ( '' === $method ) {

		return new WP_Error(
			'invalid_pricing_method',
			__(
				'Please select a pricing rule.',
				'a2z-bulk-price-changer-free'
			)
		);
	}


	/*
	 * Supported pricing methods.
	 */
	$allowed_methods = array(
		'increase_fixed',
		'decrease_fixed',
		'set_price',
	);


	if ( ! in_array( $method, $allowed_methods, true ) ) {

		return new WP_Error(
			'invalid_pricing_method',
			__(
				'Invalid pricing method.',
				'a2z-bulk-price-changer-free'
			)
		);
	}


	/*
	 * Validate the pricing value.
	 */
	if ( '' === $value || (float) $value < 0 ) {

		return new WP_Error(
			'invalid_pricing_value',
			__(
				'Please enter a valid pricing value.',
				'a2z-bulk-price-changer-free'
			)
		);
	}


	return true;
}


/**
 * Calculate bulk price.
 * - increase_fixed
 * - decrease_fixed
 * - set_price
 */
function a2zbpe_calculate_bulk_price(
	$current_price,
	$method,
	$value
) {

	$method = sanitize_key( $method );
	$value  = wc_format_decimal( $value );


	/*
	 * Set price method does not require any existing price
	 */
	if (
		'set_price' !== $method &&
		'' === $current_price
	) {

		return new WP_Error(
			'invalid_price_base',
			__(
				'This product does not have a current price for this adjustment.',
				'a2z-bulk-price-changer-free'
			)
		);
	}


	$amount = (float) $value;


	if ( '' !== $current_price ) {
		$current_price = (float) $current_price;
	}


	switch ( $method ) {

		case 'increase_fixed':

			$new_price =
				$current_price +
				$amount;

			break;


		case 'decrease_fixed':

			$new_price =
				$current_price -
				$amount;

			break;


		case 'set_price':

			$new_price = $amount;

			break;


		default:

			return new WP_Error(
				'invalid_pricing_method',
				__(
					'Invalid pricing method.',
					'a2z-bulk-price-changer-free'
				)
			);
	}


	/*
	 * Prices must never become negative.
	 */
	if ( $new_price < 0 ) {
		$new_price = 0;
	}


	return wc_format_decimal( $new_price );
}


/**
 * Get a product price.
 */
function a2zbpe_get_bulk_price(
	$product,
	$price_type
) {

	if ( 'sale' === $price_type ) {
		return $product->get_sale_price();
	}


	return $product->get_regular_price();
}


/**
 * Set a product price.
 */
function a2zbpe_set_bulk_price(
	$product,
	$price_type,
	$price
) {

	if ( 'sale' === $price_type ) {

		$product->set_sale_price( $price );

		return;
	}


	$product->set_regular_price( $price );
}


/**
 * Validate the resulting product prices.
 */
function a2zbpe_validate_bulk_product_prices( $product ) {

	$regular_price = $product->get_regular_price();
	$sale_price    = $product->get_sale_price();


	if (
		'' !== $regular_price &&
		'' !== $sale_price &&
		(float) $sale_price > (float) $regular_price
	) {

		return new WP_Error(
			'invalid_sale_price',
			__(
				'Sale price cannot be greater than the regular price.',
				'a2z-bulk-price-changer-free'
			)
		);
	}


	return true;
}


/**
 * Apply a new price to one existing product price.
 *
 * The product is modified in memory only.
 * The caller is responsible for saving the product.
 */
function a2zbpe_apply_bulk_single_price(
	$product,
	$price_type,
	$rule
) {

	$current_price = a2zbpe_get_bulk_price(
		$product,
		$price_type
	);


	$method = isset( $rule['method'] )
		? sanitize_key( $rule['method'] )
		: '';

	$value = isset( $rule['value'] )
		? wc_format_decimal( $rule['value'] )
		: '';


	/*
	 * Set price can create a new price.
	 */
	if (
		'set_price' !== $method &&
		'' === $current_price
	) {

		if ( 'sale' === $price_type ) {

			return new WP_Error(
				'invalid_sale_base',
				__(
					'This product does not have a sale price for this adjustment.',
					'a2z-bulk-price-changer-free'
				)
			);
		}


		return new WP_Error(
			'invalid_regular_base',
			__(
				'This product does not have a regular price for this adjustment.',
				'a2z-bulk-price-changer-free'
			)
		);
	}


	/*
	 * Calculate the new price.
	 */
	$new_price = a2zbpe_calculate_bulk_price(
		$current_price,
		$method,
		$value
	);


	if ( is_wp_error( $new_price ) ) {
		return $new_price;
	}


	/*
	 * Set the adjusted price in memory.
	 */
	a2zbpe_set_bulk_price(
		$product,
		$price_type,
		$new_price
	);


	return true;
}


/**
 * Apply new price to both prices.
 */
function a2zbpe_apply_bulk_both_prices(
	$product,
	$rule
) {

	$regular_price = $product->get_regular_price();
	$sale_price    = $product->get_sale_price();

	$updated_any = false;


	/*
	 * Update the regular price only when it exists.
	 */
	if ( '' !== $regular_price ) {

		$result = a2zbpe_apply_bulk_single_price(
			$product,
			'regular',
			$rule
		);


		if ( is_wp_error( $result ) ) {
			return $result;
		}


		$updated_any = true;
	}


	/*
	 * Update the sale price only when it exists.
	 */
	if ( '' !== $sale_price ) {

		$result = a2zbpe_apply_bulk_single_price(
			$product,
			'sale',
			$rule
		);


		if ( is_wp_error( $result ) ) {
			return $result;
		}


		$updated_any = true;
	}


	/*
	 * Both requires at least one existing price because
	 * set_price is not supported with both.
	 */
	if ( ! $updated_any ) {

		return new WP_Error(
			'invalid_price_base',
			__(
				'This product does not have a price for this adjustment.',
				'a2z-bulk-price-changer-free'
			)
		);
	}


	return a2zbpe_validate_bulk_product_prices(
		$product
	);
}


/**
 * Sanitize bulk product IDs.
 *
 * @param mixed $product_ids Product IDs.
 * @return int[]
 */
function a2zbpe_sanitize_bulk_product_ids( $product_ids ) {

	if ( ! is_array( $product_ids ) ) {
		return array();
	}


	$product_ids = array_map(
		'absint',
		$product_ids
	);


	$product_ids = array_filter(
		$product_ids
	);


	return array_values(
		array_unique( $product_ids )
	);
}


/**
 * AJAX: Apply bulk pricing.
 * @return void
 */
function a2zbpe_ajax_apply_bulk_pricing() {

	check_ajax_referer(
		'a2zbpe_admin_nonce',
		'nonce'
	);


	a2zbpe_verify_ajax_request();


	/**
	 * Product IDs.
	 */
	$product_ids = isset( $_POST['product_ids'] )
		? map_deep(
			wp_unslash( $_POST['product_ids'] ),
			'sanitize_text_field'
		)
		: array();


	$product_ids = a2zbpe_sanitize_bulk_product_ids(
		$product_ids
	);


	/*
	 * Price type.
	 */
	$price_type = isset( $_POST['price_type'] )
		? sanitize_key(
			wp_unslash( $_POST['price_type'] )
		)
		: '';


	if (
		! in_array(
			$price_type,
			array(
				'regular',
				'sale',
				'both',
			),
			true
		)
	) {

		wp_send_json_error(
			array(
				'message' => __(
					'Invalid price type.',
					'a2z-bulk-price-changer-free'
				),
			),
			400
		);
	}


	/*
	 * Pricing method.
	 */
	$method = isset( $_POST['method'] )
		? sanitize_key(
			wp_unslash( $_POST['method'] )
		)
		: '';


	/*
	 * Pricing value.
	 */
	$value = isset( $_POST['value'] )
		? wc_format_decimal(
			sanitize_text_field(
				wp_unslash( $_POST['value'] )
			)
		)
		: '';


	/*
	 * Set price cannot be applied to both prices.
	 */
	if (
		'both' === $price_type &&
		'set_price' === $method
	) {

		wp_send_json_error(
			array(
				'message' => __(
					'Set price cannot be used when both price types are selected.',
					'a2z-bulk-price-changer-free'
				),
			),
			400
		);
	}


	/*
	 * Build the pricing rule.
	 */
	$rule = array(
		'method' => $method,
		'value'  => $value,
	);


	/*
	 * Validate the pricing rule before processing
	 * any products.
	 */
	$validation = a2zbpe_validate_bulk_pricing_rule(
		$rule
	);


	if ( is_wp_error( $validation ) ) {

		wp_send_json_error(
			array(
				'message' => $validation->get_error_message(),
			),
			400
		);
	}


	$updated = array();
	$failed  = array();


	/*
	 * Process every selected product independently.
	 */
	foreach ( $product_ids as $product_id ) {

		$product = wc_get_product(
			$product_id
		);


		/*
		 * Product must exist.
		 */
		if ( ! $product ) {

			$failed[] = array(
				'id'      => $product_id,
				'name'    => __(
					'Unknown product',
					'a2z-bulk-price-changer-free'
				),
				'message' => __(
					'Product could not be found.',
					'a2z-bulk-price-changer-free'
				),
			);

			continue;
		}


		/*
		 * Bulk pricing is strictly limited to
		 * simple products.
		 */
		if ( ! $product->is_type( 'simple' ) ) {

			$failed[] = array(
				'id'      => $product->get_id(),
				'name'    => $product->get_name(),
				'message' => __(
					'Only simple products can be updated by bulk pricing.',
					'a2z-bulk-price-changer-free'
				),
			);

			continue;
		}


		/*
		 * Apply the adjustment in memory first.
		 */
		if ( 'both' === $price_type ) {

			$result = a2zbpe_apply_bulk_both_prices(
				$product,
				$rule
			);

		} else {

			$result = a2zbpe_apply_bulk_single_price(
				$product,
				$price_type,
				$rule
			);

		}


		if ( is_wp_error( $result ) ) {

			$failed[] = array(
				'id'      => $product->get_id(),
				'name'    => $product->get_name(),
				'message' => $result->get_error_message(),
			);

			continue;
		}


		/*
		 * Validate the final regular/sale relationship
		 * before saving.
		 */
		$price_validation =
			a2zbpe_validate_bulk_product_prices(
				$product
			);


		if ( is_wp_error( $price_validation ) ) {

			$failed[] = array(
				'id'      => $product->get_id(),
				'name'    => $product->get_name(),
				'message' =>
					$price_validation->get_error_message(),
			);

			continue;
		}


		/*
		 * Save only after the complete operation
		 * has passed validation.
		 */
		$product->save();


		$updated[] = array(
			'id'   => $product->get_id(),
			'name' => $product->get_name(),
		);
	}


	/*
	 * Prepare the updated products for the table.
	 */
	$updated_products = array();


	foreach ( $updated as $updated_product ) {

		$product = wc_get_product(
			$updated_product['id']
		);


		if ( ! $product || ! $product->is_type( 'simple' ) ) {
			continue;
		}


		$prepared_products = a2zbpe_prepare_products(
			array( $product )
		);


		if ( isset( $prepared_products[0] ) ) {

			$updated_products[] =
				$prepared_products[0];

		}
	}


	/*
	 * Return the operation result.
	 */
	wp_send_json_success(
		array(
			'message'  => __(
				'Bulk pricing completed.',
				'a2z-bulk-price-changer-free'
			),
			'updated'  => $updated,
			'failed'   => $failed,
			'products' => $updated_products,
		)
	);

}


add_action(
	'wp_ajax_a2zbpe_apply_bulk_pricing',
	'a2zbpe_ajax_apply_bulk_pricing'
);
