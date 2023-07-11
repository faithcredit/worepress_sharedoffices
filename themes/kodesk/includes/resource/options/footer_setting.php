<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'kodesk' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'kodesk' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'kodesk' ),
				'e' => esc_html__( 'Elementor', 'kodesk' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'kodesk' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'kodesk' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'kodesk' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'kodesk' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'kodesk' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'kodesk' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'kodesk' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		//Footer Navigation
		array(
		    'id'       => 'show_footer_menu_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Footer Menu', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Footer Menu.', 'kodesk' ),
		    'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
	    ),
		
		//Copyrights
		array(
			'id'      => 'copyright_text_v1',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'kodesk' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'kodesk' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		//Footer Navigation
		array(
		    'id'       => 'show_footer_menu_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Footer Menu', 'kodesk' ),
		    'desc'     => esc_html__( 'Enable/Disable Footer Menu.', 'kodesk' ),
		    'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
	    ),
		
		//Copyrights
		array(
			'id'      => 'copyright_text_v2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'kodesk' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
