<?php namespace KODESKPLUGIN\Element;

class Elementor {
	static $widgets = array(
		'slider_v1',
		'slider_v2',
		'services_v1',
		'workspaces_v1',
		'about_us_v1',
		'our_centers_v1',
		'workspaces_v2',
		'features',
		'pricing_plan_v1',
		'gallery_v1',
		'team',
		'testimonials_v1',
		'partners_v1',
		'blog',
		'book_a_tour',
		'facts_counter',
		'call_to_action',
		'services_v2',
		'videos',
		'our_centers_v2',
		'about_us_v2',
		'why_choose_us',
		'events_v1',
		'pricing_plan_v2',
		'gallery_v2',
		'testimonials_v2',
		'easy_search',
		'partners_v2',
		'about_us_v3',
		'company_achieve',
		'business_solutions',
		'services_features',
		'services_v3',
		'events_v2',
		'events_v3',
		'gallery_2_column',
		'gallery_3_column',
		'gallery_4_column',
		'gallery_masonry',
		'faqs',
		'hot_locations',
		'our_centers_v3',
		'our_centers_v4',
		'workspaces_v3',
		'workspaces_v4',
		'workspaces_details',
		'similar_workspaces',
		'news_grid',
		'news_list',
		'contact_us',
		'our_locations',
		'mixit_gallery',
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = KODESKPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\KODESKPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'kodesk',
			[
				'title' => esc_html__( 'Kodesk', 'kodesk' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'kodesk' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();