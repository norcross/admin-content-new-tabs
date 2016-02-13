<?php
/**
 * Admin Content New Tabs - Admin Module
 *
 * Contains our admin side related functionality.
 *
 * @package Admin Content New Tabs
 */

/**
 * Start our engines.
 */
class AdminContentNewTabs_Admin {

	/**
	 * Call our hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_enqueue_scripts',            array( $this, 'load_admin_script'      ),  10      );
	}

	/**
	 * Load the JS for handling the links.
	 *
	 * @param  string $hook  The admin page this is loading on.
	 *
	 * @return void
	 */
	public function load_admin_script( $hook ) {

		// Set the version and file suffix based on dev or not.
		$vers   = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? time() : ACNT_VER;
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.js' : '.min.js';

		// Load the actual JS file.
		wp_enqueue_script( 'acnt-front', plugins_url( '/js/acnt.script' . $suffix, __FILE__ ) , array( 'jquery' ), $vers, true );
	}

	// End our class.
}

// Call our class.
$AdminContentNewTabs_Admin = new AdminContentNewTabs_Admin();
$AdminContentNewTabs_Admin->init();

