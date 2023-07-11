<?php
return array(
	'title'      => 'Kodesk Service Setting',
	'id'         => 'kodesk_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'service' ),
	'sections'   => array(
		array(
			'id'     => 'kodesk_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'featured_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Featured Image', 'kodesk' ),
					'desc'     => esc_html__( 'Upload the featured image.', 'kodesk' ),
				),
				array(
					'id'       => 'featured_image_hover',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Featured Image Hover', 'kodesk' ),
					'desc'     => esc_html__( 'Upload the featured image hover.', 'kodesk' ),
				),
				array(
					'id'    => 'post_subtitle',
					'type'  => 'text',
					'title' => esc_html__( 'Post Sub Title', 'kodesk' ),
				),
				/*array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'mono' ),
					'options'  => get_fontawesome_icons(),
				),*/
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'kodesk' ),
				),
			),
		),
	),
);