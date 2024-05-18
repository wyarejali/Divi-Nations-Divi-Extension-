<?php
/*
Plugin Name: Divi Nations
Plugin URI:  https://wordpress.org/plugins/divi-nations/
Description: Divi extension to create powerful websites with useful modules
Version:     1.0.0
Author:      Divi-Nations
Author URI:  https://divi-nations.com
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
Text Domain: divi_nations
Domain Path: /languages
*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The plugin main class
 */
if( ! class_exists( 'DNE_DIVI_NATIONS_PLUGIN' ) ) :

	final class dne_divi_nations_plugin {

		/**
		 * Website url
		 */
		const website_url = 'https://divi-nations.unique-ui.com/';

		/**
		 * Plugin version
		 *
		 * @var string
		 */
		const version = '1.0.0';

		/**
		 * Plugin documentation
		 * 
		 * @var string
		 */
		const DOCUMENTATION_LINK = 'https://docs.divi-nations.com';

		/**
		 * Plugin only instance
		 */
		private static $instance;
	
		/**
		 * Class construcotr
		 */
		private function __construct() {
			$this->define_constants();
	
			register_activation_hook( __FILE__, [ $this, 'activate' ] );
	
			add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
			add_action( 'divi_extensions_init', [ $this, 'dne_extension_initialize'] );
			add_filter( 'plugin_action_links_' . DINA_DIVI_NATIONS_BASE, [ $this, 'add_plugin_action_links' ] );
		}
	
		/**
		 * Initializes a singleton instance
		 *
		 * @return \dne_divi_nations_plugin
		 */
		public static function init() {
	
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof dne_divi_nations_plugin ) ) {
				$instance = new self();
			}
	
			return $instance;
		}
		
	
		/**
		 * Define the required plugin constants
		 *
		 * @return void
		 */
		public function define_constants() {

			define( 'DINA_DIVI_NATIONS_VERSION', self::version );
			define( 'DINA_DIVI_NATIONS_FILE', __FILE__);
			define( 'DINA_DIVI_NATIONS_DIR', plugin_dir_path(DINA_DIVI_NATIONS_FILE)) ;
			define( 'DINA_DIVI_NATIONS_PATH', __DIR__);
			define( 'DINA_DIVI_NATIONS_URL', plugins_url( '', DINA_DIVI_NATIONS_FILE) );
			define( 'DINA_DIVI_NATIONS_ASSETS', DINA_DIVI_NATIONS_URL . '/assets' );
			define( 'DINA_DIVI_NATIONS_BASE', plugin_basename(__FILE__) );

			define( 'DIVI_NATIONS_BASE_URL', self::website_url );

		}
	
		/**
		 * Initialize the plugin
		 *
		 * @return void
		 */
		public function init_plugin() {
	
			require_once DINA_DIVI_NATIONS_DIR . 'includes/functions.php';

			require_once DINA_DIVI_NATIONS_DIR . 'includes/class-assets-manager.php';
			new DINA_DIVI_NATIONS\Assets();
	
		}

		/**
		 * Initialize divi modules
		 */
		public function dne_extension_initialize() {			
			require_once DINA_DIVI_NATIONS_DIR . 'includes/DiviNations.php';
		}
	
		/**
		 * Do stuff upon plugin activation
		 *
		 * @return void
		 */
		public function activate() {
			$installed = get_option( 'dne_divi_nation_installed' );
	
			if ( ! $installed ) {
				update_option( 'dne_divi_nation_installed', time() );
			}
	
			update_option( 'dne_divi_nation_version', '1.0.0' );
		}

		/**
		 * Add Pluign actions links
		 * 
		 * @param mixed $links
		 * 
		 * @return mixed $links
		 */
		public function add_plugin_action_links($links) {

			$links[] = sprintf(
				'<a href="%1$s" target="_blank" style="color: #197efb;font-weight: 600;">
					%2$s
				</a>',
				self::DOCUMENTATION_LINK,
				esc_html__( 'Docs', 'dne-divi-nations' )
			);

			return $links;
		}
	}
	
endif;


/**
 * Initializes the main plugin
 * 
 * @return void
 */
function dne_divi_nation_plugin() {
	return DNE_DIVI_NATIONS_PLUGIN::init();
}

// Kick-off the plugin
dne_divi_nation_plugin();