<?php
return array(
	'title'      => 'Kodesk Workspaces Setting',
	'id'         => 'kodesk_meta_workspace',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'workspace' ),
	'sections'   => array(
		array(
			'id'     => 'kodesk_workspace_meta_setting',
			'fields' => array(
				array(
					'id'       => 'icon_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Icon Image', 'kodesk' ),
					'desc'     => esc_html__( 'Upload the icon image.', 'kodesk' ),
				),
				array(
					'id'    => 'feature_tag',
					'type'  => 'text',
					'title' => esc_html__( 'Feature Tag', 'kodesk' ),
				),
				array(
					'id'    => 'address',
					'type'  => 'text',
					'title' => esc_html__( 'Address', 'kodesk' ),
				),
				array(
					'id'    => 'price_package',
					'type'  => 'text',
					'title' => esc_html__( 'Price Package', 'kodesk' ),
				),
				array(
					'id'    => 'users',
					'type'  => 'text',
					'title' => esc_html__( 'Users / Capacity', 'kodesk' ),
				),
				array(
					'id'    => 'square_feet',
					'type'  => 'text',
					'title' => esc_html__( 'Square Feet / Total Area', 'kodesk' ),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'kodesk' ),
				),
			),
		),
	),
);