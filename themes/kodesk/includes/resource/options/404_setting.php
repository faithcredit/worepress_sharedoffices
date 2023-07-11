<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'kodesk' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'kodesk' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'kodesk' ),
				'e' => esc_html__( 'Elementor', 'kodesk' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'kodesk' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'kodesk' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		//404 Banner
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'kodesk' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'kodesk' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'kodesk' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'kodesk' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Banner Image', 'kodesk' ),
			'desc'     => esc_html__( 'Insert Banner image.', 'kodesk' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		
		//Background Image
		array(
			'id'       => '404_background_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'kodesk' ),
			'desc'     => esc_html__( 'Insert background image for content', 'kodesk' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		
		//404 Content
		array(
			'id'    => 'error_404_sub_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Sub Title', 'kodesk' ),
			'desc'  => esc_html__( 'Enter 404 sub title that you want to show.', 'kodesk' ),
		),
		array(
			'id'    => 'error_404',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'kodesk' ),
			'desc'  => esc_html__( 'Enter 404 title that you want to show.', 'kodesk' ),
		),
		array(
			'id'    => 'error_text',
			'type'  => 'text',
			'title' => esc_html__( '404 Text', 'kodesk' ),
			'desc'  => esc_html__( 'Enter 404 text that you want to show.', 'kodesk' ),
		),
		array(
			'id'    => 'error_description',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Description', 'kodesk' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'kodesk' ),
		),
		
		//Button
		array(
			'id'    => 'back_to_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'kodesk' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'kodesk' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'kodesk' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'kodesk' ),
			'default'  => esc_html__( 'Back to Home', 'kodesk' ),
			'required' => array( 'back_to_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);
