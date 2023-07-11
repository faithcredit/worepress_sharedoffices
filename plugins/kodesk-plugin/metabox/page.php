<?php
return array(
	'title'      => 'Kodesk Setting',
	'id'         => 'kodesk_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'tribe_events', 'gallery' ),
	'sections'   => array(
		require_once KODESKPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once KODESKPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once KODESKPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once KODESKPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);