<?php
return array(
	'title'      => 'Kodesk Gallery Setting',
	'id'         => 'kodesk_meta_gallery',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'gallery' ),
	'sections'   => array(
		array(
			'id'     => 'kodesk_gallery_meta_setting',
			'fields' => array(
				array(
					'id'    => 'dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Select Image Dimension', 'kodesk' ),
					'options'  => array(
						'size_370_280' => esc_html__( 'Size 370x280', 'kodesk' ),
						'size_370_590' => esc_html__( 'Size 370x590', 'kodesk' ),
						'size_770_280' => esc_html__( 'Size 770x280', 'kodesk' ),
						'size_770_590' => esc_html__( 'Size 770x590', 'kodesk' ),
					),
				),
				array(
					'id'       => 'left_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Left Image', 'kodesk' ),
					'desc'     => esc_html__( 'Upload the left image.', 'kodesk' ),
				),
				array(
					'id'       => 'right_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Right Image', 'kodesk' ),
					'desc'     => esc_html__( 'Upload the right image.', 'kodesk' ),
				),
				array(
					'id'    => 'client',
					'type'  => 'text',
					'title' => esc_html__( 'Client', 'kodesk' ),
				),
				array(
					'id'    => 'date',
					'type'  => 'text',
					'title' => esc_html__( 'Date', 'kodesk' ),
				),
				array(
					'id'    => 'category',
					'type'  => 'text',
					'title' => esc_html__( 'Category', 'kodesk' ),
				),
				array(
					'id'    => 'location',
					'type'  => 'text',
					'title' => esc_html__( 'Location', 'kodesk' ),
				),
			),
		),
	),
);