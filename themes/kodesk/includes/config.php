<?php
/**
 * Theme config file.
 *
 * @package KODESK
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['kodesk_main_header'][] 	= array( 'kodesk_preloader', 98 );
$config['default']['kodesk_main_header'][] 	= array( 'kodesk_main_header_area', 99 );

$config['default']['kodesk_main_footer'][] 	= array( 'kodesk_preloader', 98 );
$config['default']['kodesk_main_footer'][] 	= array( 'kodesk_main_footer_area', 99 );

$config['default']['kodesk_sidebar'][] 	    = array( 'kodesk_sidebar', 99 );

$config['default']['kodesk_banner'][] 	    = array( 'kodesk_banner', 99 );


return $config;
