<?php
/**
 * Plugin Name:       A2Z Bulk Price Changer Free
 * Plugin URI:        https://a2zwoosolutions.com/bulk-price-changer-free/
 * Description:       An advanced product price editor for WooCommerce.
 * Version:           1.0.0
 * Requires at least: 6.9
 * Requires PHP:      7.4
 * Requires Plugins:  woocommerce
 * Author:            A2Z Woo Solutions
 * Author URI:        https://a2zwoosolutions.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       a2z-bulk-price-changer-free
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Plugin constants.
 */
define( 'A2ZBPE_VERSION', '1.0.0' );
define( 'A2ZBPE_PLUGIN_FILE', __FILE__ );
define( 'A2ZBPE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'A2ZBPE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


/**
 * Load plugin files.
 *
 * @return void
 */
function a2zbpe_load_files() {

	require_once A2ZBPE_PLUGIN_PATH . 'includes/admin/admin-menu.php';
	require_once A2ZBPE_PLUGIN_PATH . 'includes/admin/admin-page.php';

	require_once A2ZBPE_PLUGIN_PATH . 'includes/api/products.php';
	require_once A2ZBPE_PLUGIN_PATH . 'includes/api/bulk-pricing.php';

}


/**
 * Initialize A2ZBPE after all plugins have loaded.
 *
 * @return void
 */
function a2zbpe_init() {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	a2zbpe_load_files();

}

add_action( 'plugins_loaded', 'a2zbpe_init', 70 );