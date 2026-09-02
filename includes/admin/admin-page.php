<?php
/**
 * a2zbpe admin page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Enqueue a2zbpe admin assets.
 *
 * @param string $hook_suffix Current admin page hook.
 * @return void
 */
function a2zbpe_enqueue_admin_assets( $hook_suffix ) {

	if ( 'product_page_tasbeeh-price-editor' !== $hook_suffix ) {
		return;
	}

	wp_enqueue_style(
		'a2zbpe-admin',
		A2ZBPE_PLUGIN_URL . 'admin/assets/css/admin.css',
		array(),
		A2ZBPE_VERSION
	);

	wp_enqueue_style(
		'a2zbpe-admin-controls',
		A2ZBPE_PLUGIN_URL . 'admin/assets/css/admin-controls.css',
		array( 'a2zbpe-admin' ),
		A2ZBPE_VERSION
	);

	wp_enqueue_style(
		'a2zbpe-admin-table',
		A2ZBPE_PLUGIN_URL . 'admin/assets/css/admin-table.css',
		array( 'a2zbpe-admin' ),
		A2ZBPE_VERSION
	);

	wp_enqueue_style(
		'a2zbpe-admin-bulk-edit',
		A2ZBPE_PLUGIN_URL . 'admin/assets/css/admin-bulk-edit.css',
		array( 'a2zbpe-admin' ),
		A2ZBPE_VERSION
	);

	wp_enqueue_style(
		'a2zbpe-footer',
		A2ZBPE_PLUGIN_URL . 'admin/assets/css/footer.css',
		array( 'a2zbpe-admin' ),
		A2ZBPE_VERSION
    );

	wp_enqueue_style(
		'a2zbpe-admin-responsive',
		A2ZBPE_PLUGIN_URL . 'admin/assets/css/admin-responsive.css',
		array(
			'a2zbpe-admin-controls',
			'a2zbpe-admin-table',
			'a2zbpe-admin-bulk-edit',
		),
		A2ZBPE_VERSION
	);

	wp_enqueue_script(
		'a2zbpe-admin-products',
		A2ZBPE_PLUGIN_URL . 'admin/assets/js/admin-products.js',
		array( 'jquery' ),
		A2ZBPE_VERSION,
		true
	);

	wp_enqueue_script(
		'a2zbpe-search-filter',
		A2ZBPE_PLUGIN_URL . 'admin/assets/js/search-filter.js',
		array( 'jquery' ),
		A2ZBPE_VERSION,
		true
    );

	wp_enqueue_script(
		'a2zbpe-admin-bulk-edit',
		A2ZBPE_PLUGIN_URL . 'admin/assets/js/admin-bulk-edit.js',
		array(
			'jquery',
			'a2zbpe-admin-products',
		),
		A2ZBPE_VERSION,
		true
	);

	wp_localize_script(
		'a2zbpe-admin-products',
		'a2zbpeAdmin',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'a2zbpe_admin_nonce' ),
		)
	);
}

add_action( 'admin_enqueue_scripts', 'a2zbpe_enqueue_admin_assets' );


/**
 * Render a2zbpe admin page.
 *
 * @return void
 */
function a2zbpe_render_admin_page() {

	require A2ZBPE_PLUGIN_PATH . 'admin/views/header.php';

	require A2ZBPE_PLUGIN_PATH . 'admin/views/search-filter.php';

	require A2ZBPE_PLUGIN_PATH . 'admin/views/bulk-tab-table.php';

	require A2ZBPE_PLUGIN_PATH . 'admin/views/footer.php';
}