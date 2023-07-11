<?php
return array(
	'title'      => 'Kodesk Testimonials Setting',
	'id'         => 'kodesk_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'kodesk_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'kodesk' ),
				),
				array(
					'id'    => 'rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'kodesk' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
				),
			),
		),
	),
);