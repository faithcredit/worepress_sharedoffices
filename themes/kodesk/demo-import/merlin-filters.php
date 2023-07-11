<?php
/**
 * Available filters for extending Merlin WP.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */


/**
 * Add your widget area to unset the default widgets from.
 * If your theme's first widget area is "sidebar-1", you don't need this.
 *
 * @see https://stackoverflow.com/questions/11757461/how-to-populate-widgets-on-sidebar-on-theme-activation
 *
 * @param  array $widget_areas Arguments for the sidebars_widgets widget areas.
 *
 * @return array of arguments to update the sidebars_widgets option.
 */
function kodesk_unset_default_widgets_args( $widget_areas ) {

	$widget_areas = array(
		'default-sidebar' => array(),
	);

	return $widget_areas;
}

add_filter( 'merlin_unset_default_widgets_args', 'kodesk_unset_default_widgets_args' );

/**
 * Custom content for the generated child theme's functions.php file.
 *
 * @param string $output Generated content.
 * @param string $slug   Parent theme slug.
 */
function kodesk_child_functions_php( $output, $slug ) {

	$slug_no_hyphens = strtolower( preg_replace( '#[^a-zA-Z]#', '', $slug ) );

	$output = "
		<?php
		/**
		 * Theme functions and definitions.
		 */
		function {$slug_no_hyphens}_child_enqueue_styles() {

		    if ( SCRIPT_DEBUG ) {
		        wp_enqueue_style( '{$slug}-style' , get_template_directory_uri() . '/style.css' );
		    } else {
		        wp_enqueue_style( '{$slug}-minified-style' , get_template_directory_uri() . '/style.min.css' );
		    }

		    wp_enqueue_style( '{$slug}-child-style',
		        get_stylesheet_directory_uri() . '/style.css',
		        array( '{$slug}-style' ),
		        wp_get_theme()->get('Version')
		    );
		}

		add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles' );\n
	";

	// Let's remove the tabs so that it displays nicely.
	$output = trim( preg_replace( '/\t+/', '', $output ) );

	// Filterable return.
	return $output;
}

add_filter( 'merlin_generate_child_functions_php', 'kodesk_child_functions_php', 10, 2 );

/**
 * Define the demo import files (local files).
 * You have to use the same filter as in above example,
 * but with a slightly different array keys: local_*.
 * The values have to be absolute paths (not URLs) to your import files.
 * To use local import files, that reside in your theme folder,
 * please use the below code.
 * Note: make sure your import files are readable!
 */
function kodesk_local_import_files() {
	return array(
		array(
			'import_file_name'         => esc_html__('Main Demo', 'kodesk'),
			'local_import_widget_file' => trailingslashit( get_template_directory() ) . 'demo-import/content/widgets.json',
			//'import_rev_slider_file_url'      => trailingslashit( get_template_directory_uri() ) . 'demo-import/content/home.zip',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'demo-import/content/redux_options.json',
					'option_name' => 'kodesk_options',
				),
			),
			'local_import_file'        => trailingslashit( get_template_directory() ) . 'demo-import/content/content.xml',
			'import_preview_image_url' => get_template_directory_uri() . '/screenshot.png',
			'import_notice'            => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'kodesk' ),
			'preview_url'              => 'https://fastwpdemo.com/newwp/kodesk/',
		),
	);
}

add_filter( 'merlin_import_files', 'kodesk_local_import_files' );

/**
 * Execute custom code after the whole import has finished.
 */
function kodesk_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
	$onepage_menu = get_term_by( 'name', 'OnePage Menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations', array(
			'main_menu' => $main_menu->term_id,
			'footer_menu' => $footer_menu->term_id,
			'onepage_menu' => $onepage_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home Page 01' );
	$blog_page_id  = get_page_by_title( 'Blog Classic View' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
    
    $logo = get_page_by_title( 'logo', OBJECT, 'attachment' );

    if( $logo ) {
    	set_theme_mod( 'custom_logo', $logo->ID );
    }

   /*
    if( class_exists('RevSliderSliderImport') ) {
		foreach(array('home', 'home-1') as $slider) {
			$file = get_template_directory() . '/demo-import/content/'.$slider.'.zip';
			if( file_exists($file) ) {
				$importer = new RevSliderSliderImport();
				$response = $importer->import_slider( true, $file );
			}
		}
    }
	*/

	/*$header = get_page_by_title( 'header', OBJECT, 'elementor_library' );
	if( $header ) {
		$meta = get_post_meta($header->ID, '_elementor_data', true);
		if( $meta && $main_menu) {
			$meta = json_decode($meta, true);
			if(isset($meta[0]['elements'][0]['elements'][1]['elements'][1]['elements'])) {

				$meta[0]['elements'][0]['elements'][1]['elements'][1]['elements'][0]['settings']['wp']['nav_menu'] = $main_menu->term_id;
				update_post_meta( $header->ID, '_elementor_data', $meta );
			}
		}
	}*/
}

add_action( 'merlin_after_all_import', 'kodesk_after_import_setup' );
add_filter( 'upload_mimes', function( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	
	return $mimes;
});