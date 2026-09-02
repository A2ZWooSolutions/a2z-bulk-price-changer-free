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
		__( 'Tasbeeh Price Editor', 'tasbeeh-price-editor' ),
		__( 'Price Changer', 'tasbeeh-price-editor' ),
		'manage_woocommerce',
		'tasbeeh-price-editor',
		'a2zbpe_render_admin_page'
	);

}

add_action( 'admin_menu', 'a2zbpe_register_admin_menu' );