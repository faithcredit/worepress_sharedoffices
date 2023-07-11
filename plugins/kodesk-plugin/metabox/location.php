<?php
return array(
	'title'      => 'Kodesk Location Setting',
	'id'         => 'kodesk_meta_location',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'location' ),
	'sections'   => array(
		array(
			'id'     => 'kodesk_location_meta_setting',
			'fields' => array(
				array(
					'id'       => 'location_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Location Icons', 'kodesk' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'spaces',
					'type'  => 'text',
					'title' => esc_html__( 'Spaces', 'kodesk' ),
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