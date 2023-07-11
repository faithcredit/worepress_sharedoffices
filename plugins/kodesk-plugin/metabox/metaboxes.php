<?php
if ( ! function_exists( "kodesk_add_metaboxes" ) ) {
	function kodesk_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'service.php',
			'location.php',
			'workspace.php',
			'team.php',
			'testimonials.php',
			'gallery.php',
			'event.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( KODESKPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/kodesk_options/boxes", "kodesk_add_metaboxes" );
}

