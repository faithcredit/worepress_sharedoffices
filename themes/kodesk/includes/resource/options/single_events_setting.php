<?php return array(
	'title'      => esc_html__( 'Single Events Settings', 'kodesk' ),
	'id'         => 'single_kodesk_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'event_facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Events Share', 'kodesk' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Facebook', 'kodesk' ),
			'default' => false,
		),
		array(
			'id'      => 'event_twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Events Share', 'kodesk' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Twitter', 'kodesk' ),
			'default' => false,
		),
		array(
			'id'      => 'event_linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Events Share', 'kodesk' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Linkedin', 'kodesk' ),
			'default' => false,
		),
		array(
			'id'      => 'event_pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Events Share', 'kodesk' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Pinterest', 'kodesk' ),
			'default' => false,
		),
		
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);
