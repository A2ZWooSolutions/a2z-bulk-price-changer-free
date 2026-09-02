<?php
/**
 * a2zbpe WooCommerce product API.
 *
 * Bulk pricing is intentionally handled by:
 *
 * includes/api/bulk-pricing.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Verify AJAX request permissions.
 *
 * @return void
 */
function a2zbpe_verify_ajax_request() {

	if ( ! current_user_can( 'manage_woocommerce' ) ) {

		wp_send_json_error(
			array(
				'message' => __(
					'You do not have permission to perform this action.',
					'tasbeeh-price-editor'
				),
			),
			403
		);

	}

}


/**
 * Get available filter options.
 * @return array
 */
function a2zbpe_get_filter_options() {

	$categories = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
			'orderby'    => 'name',
			'order'      => 'ASC',
		)
	);


	if ( is_wp_error( $categories ) ) {
		$categories = array();
	}


	$statuses = function_exists( 'wc_get_product_statuses' )
		? wc_get_product_statuses()
		: array();


	$stock_statuses = function_exists( 'wc_get_product_stock_status_options' )
		? wc_get_product_stock_status_options()
		: array();


	return array(
		'categories'     => $categories,
		'stock_statuses' => $stock_statuses,
		'statuses'       => $statuses,
	);

}


/**
 * Get simple products using the supported filters.
 */
function a2zbpe_get_products_by_filters(
	$filters = array(),
	$limit = 100
) {

	$limit = absint( $limit );

	if ( 0 === $limit ) {
		$limit = 100;
	}


	$args = array(

		'type' => 'simple',

		'status' => array(
			'publish',
			'draft',
			'pending',
			'private',
		),

		'limit'  => $limit,
		'return' => 'objects',
	);


	/**
	 * Category filter.
	 */
	if ( ! empty( $filters['category'] ) ) {

		$category_id = absint(
			$filters['category']
		);


		$category = get_term(
			$category_id,
			'product_cat'
		);


		if (
			$category &&
			! is_wp_error( $category )
		) {

			$args['category'] = array(
				$category->slug,
			);

		}

	}


	/**
	 * Stock status filter.
	 */
	if ( ! empty( $filters['stock_status'] ) ) {

		$stock_status = sanitize_key(
			$filters['stock_status']
		);


		$allowed_stock_statuses = array(
			'instock',
			'outofstock',
			'onbackorder',
		);


		if (
			in_array(
				$stock_status,
				$allowed_stock_statuses,
				true
			)
		) {

			$args['stock_status'] = $stock_status;

		}

	}


	/**
	 * Product status filter.
	 */
	if ( ! empty( $filters['status'] ) ) {

		$status = sanitize_key(
			$filters['status']
		);


		$allowed_statuses = array(
			'publish',
			'draft',
			'pending',
			'private',
		);


		if (
			in_array(
				$status,
				$allowed_statuses,
				true
			)
		) {

			$args['status'] = $status;

		}

	}


	return wc_get_products( $args );

}


/**
 * Prepare simple products for JavaScript.
 *
 * Variable products and variations are deliberately excluded
 */
function a2zbpe_prepare_products( $products ) {

	$data = array();


	$status_labels = function_exists( 'wc_get_product_statuses' )
		? wc_get_product_statuses()
		: array();


	$stock_labels = function_exists( 'wc_get_product_stock_status_options' )
		? wc_get_product_stock_status_options()
		: array();


	foreach ( $products as $product ) {

		if ( ! $product ) {
			continue;
		}


		/*
		 * Protection boundary:
		 */
		if ( ! $product->is_type( 'simple' ) ) {
			continue;
		}


		$product_id = $product->get_id();

		$image_id = $product->get_image_id();


		$image_url = $image_id
			? wp_get_attachment_image_url(
				$image_id,
				'thumbnail'
			)
			: wc_placeholder_img_src( 'thumbnail' );


		$status = $product->get_status();

		$stock_status = $product->get_stock_status();


		$data[] = array(

			'id' => $product_id,

			'name' => $product->get_name(),

			'image' => $image_url,

			'type' => 'simple',

			'status' => $status,

			'status_label' => isset(
				$status_labels[ $status ]
			)
				? $status_labels[ $status ]
				: ucfirst( $status ),

			'stock_status' => $stock_status,

			'stock_label' => isset(
				$stock_labels[ $stock_status ]
			)
				? $stock_labels[ $stock_status ]
				: ucfirst( $stock_status ),

			'stock_quantity' => $product->get_stock_quantity(),

			'manage_stock' => $product->managing_stock(),

			'regular_price' => $product->get_regular_price(),

			'sale_price' => $product->get_sale_price(),

			'price' => $product->get_price(),

		);

	}


	return $data;

}


/**
 * AJAX: Filter products.
 */
function a2zbpe_ajax_filter_products() {

	check_ajax_referer(
		'a2zbpe_admin_nonce',
		'nonce'
	);


	a2zbpe_verify_ajax_request();


	$filters = array(

		'category' => isset( $_POST['category'] )
			? absint(
				$_POST['category']
			)
			: 0,


		'stock_status' => isset( $_POST['stock_status'] )
			? sanitize_key(
				wp_unslash(
					$_POST['stock_status']
				)
			)
			: '',


		'status' => isset( $_POST['status'] )
			? sanitize_key(
				wp_unslash(
					$_POST['status']
				)
			)
			: '',

	);


	$products = a2zbpe_get_products_by_filters(
		$filters
	);


	wp_send_json_success(
		array(
			'source' => 'filter',

			'products' => a2zbpe_prepare_products(
				$products
			),
		)
	);

}


add_action(
	'wp_ajax_a2zbpe_filter_products',
	'a2zbpe_ajax_filter_products'
);