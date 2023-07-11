<?php

namespace KODESK\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Hooks {


	function __construct() {

		add_action( 'kodesk_main_header', array( $this, 'header' ) );
	}

	/**
	 * Hook up main headers with different header styles
	 *
	 * @return void This function returns nothing.
	 */
	function header() {


	}


}

/**
 * Footer and Enqueue class
 */
class Hooks {


	function __construct() {

		add_action( 'kodesk_main_footer', array( $this, 'footer' ) );
	}

	/**
	 * Hook up main footer with different footer styles
	 *
	 * @return void This function returns nothing.
	 */
	function footer() {


	}


}