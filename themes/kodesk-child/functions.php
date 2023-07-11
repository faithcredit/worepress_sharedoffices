<?php
/**
 * Theme functions and definitions.
 */
function kodesk_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'kodesk-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'kodesk-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'kodesk-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'kodesk-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'kodesk_child_enqueue_styles' );