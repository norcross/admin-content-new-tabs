<?php
/**
 * Admin Content New Tabs - Front Module
 *
 * Contains our front end side related functionality.
 *
 * @package Admin Content New Tabs
 */

/**
 * Start our engines.
 */
class AdminContentNewTabs_Front {

	/**
	 * Call our hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts',               array( $this, 'load_front_script'      ),  10      );
	}

	/**
	 * Load the JS for handling the links.
	 *
	 * @return void
	 */
	public function load_front_script() {

		// Set the version and file suffix based on dev or not.
		$vers   = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? time() : ACNT_VER;
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.js' : '.min.js';

		// Load the actual JS file.
		wp_enqueue_script( 'acnt-front', plugins_url( '/js/acnt.script' . $suffix, __FILE__ ) , array( 'jquery' ), $vers, true );
	}

	// End our class.
}

// Call our class.
$AdminContentNewTabs_Front = new AdminContentNewTabs_Front();
$AdminContentNewTabs_Front->init();

