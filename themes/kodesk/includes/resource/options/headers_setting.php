<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'kodesk' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'kodesk' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'kodesk' ),
				'e' => esc_html__( 'Elementor', 'kodesk' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'kodesk' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'kodesk' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'kodesk' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'kodesk' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style', 'kodesk' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Boxed Layout', 'kodesk' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    ),
			    'header_v3'  => array(
				    'alt' => esc_html__( 'Header OnePage', 'kodesk' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'kodesk' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		
		//Topbar
		array(
		    'id'       => 'show_top_bar_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Top Bar', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Top Bar.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
			'id'    => 'social_media_v1',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'kodesk' ),
			'required' => array( 'show_social_media_v1', '=', true ),
		),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'kodesk' ),
			'required' => array( 'show_working_hours_v1', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'phone_number_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'kodesk' ),
			'required' => array( 'show_phone_number_v1', '=', true ),
		),
		
		//Request a Visit
		array(
		    'id'       => 'show_request_btn_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Request a Visit', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Request a Visit.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'request_btn_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Request a Visit Name', 'kodesk' ),
			'required' => array( 'show_request_btn_v1', '=', true ),
		),
		array(
		    'id'       => 'request_btn_link_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Request a Visit Link', 'kodesk' ),
			'required' => array( 'show_request_btn_v1', '=', true ),
		),
		
		//Reviews
		array(
		    'id'       => 'show_reviews_btn_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Reviews', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'reviews_btn_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Reviews Name', 'kodesk' ),
			'required' => array( 'show_reviews_btn_v1', '=', true ),
		),
		array(
		    'id'       => 'reviews_btn_link_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Reviews Link', 'kodesk' ),
			'required' => array( 'show_reviews_btn_v1', '=', true ),
		),
		
		//Add Your Space
		array(
		    'id'       => 'show_add_space_btn_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Add Your Space', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Add Your Space.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'add_space_btn_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Add Your Space Name', 'kodesk' ),
			'required' => array( 'show_add_space_btn_v1', '=', true ),
		),
		array(
		    'id'       => 'add_space_btn_link_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Add Your Space Link', 'kodesk' ),
			'required' => array( 'show_add_space_btn_v1', '=', true ),
		),
		
		//Light Logo
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Light Logo', 'kodesk'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'       => 'light_logo_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Light Logo', 'kodesk' ),
			'subtitle' => esc_html__( 'Insert site Light logo image', 'kodesk' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'light_logo_dimension_v1',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Light Logo Dimension', 'kodesk' ),
			'subtitle' => esc_html__( 'Select Light Logo Dimension', 'kodesk' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		
		//Dark Logo
		array(
            'id' => 'normal_logo_show2',
            'type' => 'switch',
            'title' => esc_html__('Enable Dark Logo', 'kodesk'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'       => 'dark_logo_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Dark Logo', 'kodesk' ),
			'subtitle' => esc_html__( 'Insert site Dark logo image', 'kodesk' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		array(
			'id'       => 'dark_logo_dimension_v1',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Dark Logo Dimension', 'kodesk' ),
			'subtitle' => esc_html__( 'Select Dark Logo Dimension', 'kodesk' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Search.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		/***********************************************************************
								Sidebar Info V1
		************************************************************************/
		array(
            'id' => 'show_sidebar_info_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Information', 'kodesk'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		//Contact Title
		array(
		    'id'       => 'sidebar_contact_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Title', 'kodesk' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_info_v1', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'sidebar_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'kodesk' ),
			'required' => array( 'show_sidebar_info_v1', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'sidebar_phone_number_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'kodesk' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_info_v1', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'sidebar_email_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'kodesk' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_info_v1', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_sidebar_social_media_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'show_sidebar_info_v1', '=', true ),
	    ),
		array(
			'id'    => 'sidebar_social_media_v1',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'kodesk' ),
			'required' => array( 'show_sidebar_social_media_v1', '=', true ),
		),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'kodesk' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		//Light Logo
		array(
            'id' => 'normal_logo_show3',
            'type' => 'switch',
            'title' => esc_html__('Enable Light Logo', 'kodesk'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'       => 'light_logo_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Light Logo', 'kodesk' ),
			'subtitle' => esc_html__( 'Insert site Light logo image', 'kodesk' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		array(
			'id'       => 'light_logo_dimension_v2',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Light Logo Dimension', 'kodesk' ),
			'subtitle' => esc_html__( 'Select Light Logo Dimension', 'kodesk' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		
		//Dark Logo
		array(
            'id' => 'normal_logo_show4',
            'type' => 'switch',
            'title' => esc_html__('Enable Dark Logo', 'kodesk'),
            'default' => true,
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'       => 'dark_logo_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Dark Logo', 'kodesk' ),
			'subtitle' => esc_html__( 'Insert site Dark logo image', 'kodesk' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		array(
			'id'       => 'dark_logo_dimension_v2',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Dark Logo Dimension', 'kodesk' ),
			'subtitle' => esc_html__( 'Select Dark Logo Dimension', 'kodesk' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Search.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		/***********************************************************************
								Sidebar Info V2
		************************************************************************/
		array(
            'id' => 'show_sidebar_info_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Information', 'kodesk'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		
		//Contact Title
		array(
		    'id'       => 'sidebar_contact_title_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Title', 'kodesk' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_info_v2', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'sidebar_address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'kodesk' ),
			'required' => array( 'show_sidebar_info_v2', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'sidebar_phone_number_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'kodesk' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_info_v2', '=', true ),
	    ),
		
		//Email Address
		array(
		    'id'       => 'sidebar_email_address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'kodesk' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_info_v2', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_sidebar_social_media_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'kodesk' ),
			'default'  => '',
			'required' => array( 'show_sidebar_info_v2', '=', true ),
	    ),
		array(
			'id'    => 'sidebar_social_media_v2',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'kodesk' ),
			'required' => array( 'show_sidebar_social_media_v2', '=', true ),
		),
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
