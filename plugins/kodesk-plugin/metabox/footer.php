<?php

return array(
	'id'     => 'kodesk_footer_settings',
	'title'  => esc_html__( "Kodesk Footer Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'kodesk' ),
			'options' => array(
				'd'    => esc_html__( 'Default', 'kodesk' ),
				'e'    => esc_html__( 'Elementor', 'kodesk' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Footer Styles', 'kodesk' ),
			'options'  => array(
				'footer_v1' => array(
					'alt' => 'Footer Style One',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
				),
				'footer_v2' => array(
					'alt' => 'Footer Style Two',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
				),
			),
			'required' => array( array( 'footer_source_type', 'equals', 'd' ) ),
		),
	),
);