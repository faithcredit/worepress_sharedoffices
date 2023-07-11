<?php
return array(
	'title'      => 'Kodesk Event Setting',
	'id'         => 'kodesk_meta_event',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'tribe_events' ),
	'sections'   => array(
		array(
			'id'     => 'kodesk_event_meta_setting',
			'fields' => array(
				array(
					'id'    => 'g_map',
					'type'  => 'textarea',
					'title' => esc_html__( 'Google Map Embed Code', 'kodesk' ),
				),
			),
		),
	),
);