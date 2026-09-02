<?php
/**
 * a2zbpe admin menu.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Register a2zbpe admin menu.
 *
 * @return void
 */
function a2zbpe_register_admin_menu() {

	add_submenu_page(
		'edit.php?post_type=product',
		__( 'A2Z Bulk Price Changer Free', 'a2z-bulk-price-changer-free' ),
		__( 'Price Changer', 'a2z-bulk-price-changer-free' ),
		'manage_woocommerce',
		'a2z-bulk-price-changer-free',
		'a2zbpe_render_admin_page'
	);

}

add_action( 'admin_menu', 'a2zbpe_register_admin_menu' );