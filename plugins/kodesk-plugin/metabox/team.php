<?php
return array(
	'title'      => 'Kodesk Team Setting',
	'id'         => 'kodesk_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'kodesk_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'kodesk' ),
				),
				array(
					'id'       => 'signature',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Signature Image', 'kodesk' ),
					'desc'     => esc_html__( 'Upload the signature image.', 'kodesk' ),
				),
				array(
					'id'       => 'phone_number',
					'type'  => 'text',
					'title' => esc_html__( 'Phone Number', 'kodesk' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'kodesk' ),
				),
			),
		),
	),
);