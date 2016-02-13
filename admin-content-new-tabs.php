<?php
/**
 * Plugin Name: Admin Content New Tabs
 * Plugin URI: http://andrewnorcross.com/plugins/
 * Description: Open all the various new, edit, and view links in a new tab.
 * Author: Andrew Norcross
 * Author URI: http://andrewnorcross.com/
 * Version: 0.0.1
 * Text Domain: admin-content-new-tabs
 * Requires WP: 4.0
 * Domain Path: languages
 * License: MIT - http://norcross.mit-license.org
 * GitHub Plugin URI: https://github.com/norcross/admin-content-new-tabs
 */

// Define our base file.
if( ! defined( 'ACNT_BASE' ) ) {
	define( 'ACNT_BASE', plugin_basename( __FILE__ ) );
}

// Define our base directory.
if ( ! defined( 'ACNT_DIR' ) ) {
	define( 'ACNT_DIR', plugin_dir_path( __FILE__ ) );
}

// Define our version.
if( ! defined( 'ACNT_VER' ) ) {
	define( 'ACNT_VER', '0.0.1' );
}


/**
 * Call our class.
 */
class AdminContentNewTabs_Base
{
	/**
	 * Static property to hold our singleton instance.
	 * @var $instance
	 */
	static $instance = false;

	/**
	 * This is our constructor. There are many like it, but this one is mine.
	 */
	private function __construct() {
		add_action( 'plugins_loaded',               array( $this, 'textdomain'          )           );
		add_action( 'plugins_loaded',               array( $this, 'load_files'          )           );
	}

	/**
	 * If an instance exists, this returns it.  If not, it creates one and
	 * retuns it.
	 *
	 * @return $instance
	 */
	public static function getInstance() {

		if ( ! self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Load our textdomain for localization.
	 *
	 * @return void
	 */
	public function textdomain() {
		load_plugin_textdomain( 'admin-content-new-tabs', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Load our actual files in the places they belong.
	 *
	 * @return void
	 */
	public function load_files() {

		// Load our front end related functions.
		if ( ! is_admin() ) {
			require_once( ACNT_DIR . 'lib/front.php' );
		}

		// Load our admin related functions.
		if ( is_admin() ) {
			require_once( ACNT_DIR . 'lib/admin.php' );
		}
	}

	// End our class.
}

// Instantiate our class.
$AdminContentNewTabs_Base = AdminContentNewTabs_Base::getInstance();
