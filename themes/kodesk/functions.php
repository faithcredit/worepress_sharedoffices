<?php require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'kodesk_setup_theme' );
add_action( 'after_setup_theme', 'kodesk_load_default_hooks' );


function kodesk_setup_theme() {

	load_theme_textdomain( 'kodesk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
    add_image_size( 'kodesk_540x540', 540, 540, true ); //Location V1
    add_image_size( 'kodesk_370x470', 370, 470, true ); //Workspaces V2 & V3
    add_image_size( 'kodesk_200x300', 200, 300, true ); //Gallery V1
    add_image_size( 'kodesk_415x300', 415, 300, true ); //Gallery V1
    add_image_size( 'kodesk_415x620', 415, 620, true ); //Gallery V1
    add_image_size( 'kodesk_370x520', 370, 520, true ); //Team
    add_image_size( 'kodesk_50x50', 50, 50, true ); //Testimonials V1
    add_image_size( 'kodesk_340x340', 340, 340, true ); //Blog & Grid & List
    add_image_size( 'kodesk_310x180', 310, 180, true ); //Slider Workshop V2
    add_image_size( 'kodesk_270x370', 270, 370, true ); //Services V2
    add_image_size( 'kodesk_310x250', 310, 250, true ); //Our Centers V2
    add_image_size( 'kodesk_370x280', 370, 280, true ); //Gallery V2
    add_image_size( 'kodesk_370x320', 370, 320, true ); //Events V3
    add_image_size( 'kodesk_570x430', 570, 430, true ); //Gallery 2 Column
    add_image_size( 'kodesk_370x280', 370, 280, true ); //Gallery 3 Column
    add_image_size( 'kodesk_400x360', 400, 360, true ); //Gallery 4 Column
    add_image_size( 'kodesk_370x590', 370, 590, true ); //Gallery Masonry
    add_image_size( 'kodesk_770x280', 770, 280, true ); //Gallery Masonry
    add_image_size( 'kodesk_770x590', 770, 590, true ); //Gallery Masonry
	add_image_size( 'kodesk_310x180', 310, 180, true ); //Workspaces V4
    add_image_size( 'kodesk_70x70', 70, 70, true ); //Popular Post Footer & Blog Sidebar
    add_image_size( 'kodesk_80x80', 80, 80, true ); //Popular Post Footer & Blog Sidebar
    add_image_size( 'kodesk_1170x600', 1170, 600, true ); //Events Details
    add_image_size( 'kodesk_770x400', 770, 400, true ); //Blog Details
	
	/*---------- Register image sizes ends ----------*/

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'kodesk' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'kodesk' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'kodesk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'kodesk_admin_init', 2000000 );
}

/**
 * [kodesk_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function kodesk_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [kodesk_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function kodesk_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'kodesk' . '_options-mods' );

	register_sidebar( array(
		'name' => esc_html__( 'Default Sidebar', 'kodesk' ),
		'id' => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'kodesk' ),
		'before_widget'=>'<div id="%1$s" class="sidebar-widget widget %2$s"><div class="widget-content %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	) );
	register_sidebar(array(
		'name' => esc_html__( 'Blog Listing', 'kodesk' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'kodesk' ),
		'before_widget'=>'<div id="%1$s" class="sidebar-widget widget %2$s"><div class="widget-content %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'kodesk'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'kodesk'),
		'before_widget'=>'<div id="%1$s" class="col-lg-3 col-md-6 col-sm-12 footer-column"><div class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
		register_sidebar(array(
			'name' => esc_html__('Footer Widget V2', 'kodesk'),
			'id' => 'footer-sidebar-2',
			'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'kodesk'),
			'before_widget'=>'<div id="%1$s" class="col-lg-3 col-md-6 col-sm-12 footer-column"><div class="footer-widget %2$s">',
			'after_widget'=>'</div></div>',
			'before_title' => '<div class="widget-title"><h3>',
			'after_title' => '</h3></div>'
		));
		register_sidebar(array(
			'name' => esc_html__('Workspaces Widget', 'kodesk'),
			'id' => 'workspaces-sidebar',
			'description' => esc_html__('Widgets in this area will be shown in Workspaces Details Area.', 'kodesk'),
			'before_widget' => '<div id="%1$s" class="single-workspaces-sidebar sidebar-widget %2$s"><div class="widget-content %2$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="widget-title"><h3>',
			'after_title' => '</h3></div>'
		));
	}
	
	if ( ! is_object( kodesk_WSH() ) ) {
		return;
	}

	$sidebars = kodesk_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( kodesk_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'kodesk_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function kodesk_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'kodesk' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'kodesk' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'kodesk' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'kodesk' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'kodesk' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'kodesk' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'kodesk' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'kodesk' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'kodesk' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'kodesk_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function kodesk_enqueue_scripts() {
	//styles
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/assets/css/fontawesome-all.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
    wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	wp_enqueue_style( 'kodesk-main', get_stylesheet_uri() );
	wp_enqueue_style( 'kodesk-color', get_template_directory_uri() . '/assets/css/theme-color.css' );
	wp_enqueue_style( 'kodesk-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'kodesk-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'kodesk-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'lettering', get_template_directory_uri().'/assets/js/jquery.lettering.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'circleType', get_template_directory_uri().'/assets/js/jquery.circleType.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'pagenav', get_template_directory_uri().'/assets/js/pagenav.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'countTo', get_template_directory_uri().'/assets/js/jquery.countTo.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri().'/assets/js/countdown.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'kodesk-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'kodesk_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function kodesk_fonts_url() {
	
	$fonts_url = '';
	$font_families['DM+Sans'] = 'DM Sans:ital,wght@0,400,0,500,0,700,1,400,1,500,1,700';

	$font_families = apply_filters( 'KODESK/includes/classes/header_enqueue/font_families', $font_families );

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$protocol  = is_ssl() ? 'https' : 'http';
	$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

	return esc_url_raw($fonts_url);
}

function kodesk_theme_styles() {
    wp_enqueue_style( 'kodesk-theme-fonts', kodesk_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'kodesk_theme_styles' );
add_action( 'admin_enqueue_scripts', 'kodesk_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) kodesk_set function

/**
 * [kodesk_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'kodesk_set' ) ) {
	function kodesk_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) kodesk_add_editor_styles function

function kodesk_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'kodesk_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = kodesk_WSH()->option(); 
if( kodesk_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}
/*---------- More functions ends ----------*/
add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);