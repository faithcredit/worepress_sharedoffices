<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

defined('THEMEKALIA_IMPORT_VENDOR_PATH') || define('THEMEKALIA_IMPORT_VENDOR_PATH', get_template_directory() . '/demo-import/vendor/');

require_once THEMEKALIA_IMPORT_VENDOR_PATH . 'autoload.php';

if ( ! class_exists( '\WP_Importer' ) ) {
	require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
}
require_once get_template_directory() . '/demo-import/importer/WPImporterLogger.php';
require_once get_template_directory() . '/demo-import/importer/WPImporterLoggerCLI.php';
require_once get_template_directory() . '/demo-import/importer/WXRImportInfo.php';
require_once get_template_directory() . '/demo-import/importer/WXRImporter.php';
require_once get_template_directory() . '/demo-import/importer/Importer.php';
/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => 'demo-import',
		// Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'demo-import',
		// The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php',
		// The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options',
		// The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes',
		// URL for the 'child-action-link'.
		'dev_mode'             => true,
		// Enable development mode for testing.
		'license_step'         => false,
		// EDD license activation step.
		'license_required'     => false,
		// Require the license activation step.
		'license_help_url'     => '',
		// URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '',
		// EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => 'Kodesk',
		// EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => 'kodesk',
		// EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => home_url( '/' ),
		// Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'          => esc_html__( 'ThemeKalia Import', 'kodesk' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'       => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'kodesk' ),
		'return-to-dashboard' => esc_html__( 'Return to the dashboard', 'kodesk' ),
		'ignore'              => esc_html__( 'Disable this wizard', 'kodesk' ),

		'btn-skip'                 => esc_html__( 'Skip', 'kodesk' ),
		'btn-next'                 => esc_html__( 'Next', 'kodesk' ),
		'btn-start'                => esc_html__( 'Start', 'kodesk' ),
		'btn-no'                   => esc_html__( 'Cancel', 'kodesk' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'kodesk' ),
		'btn-child-install'        => esc_html__( 'Install', 'kodesk' ),
		'btn-content-install'      => esc_html__( 'Install', 'kodesk' ),
		'btn-import'               => esc_html__( 'Import', 'kodesk' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'kodesk' ),
		'btn-license-skip'         => esc_html__( 'Later', 'kodesk' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'kodesk' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'kodesk' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'kodesk' ),
		'license-label'            => esc_html__( 'License key', 'kodesk' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'kodesk' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'kodesk' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'kodesk' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'kodesk' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'kodesk' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'kodesk' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'kodesk' ),

		'child-header'         => esc_html__( 'Install Child Theme', 'kodesk' ),
		'child-header-success' => esc_html__( 'You\'re good to go!', 'kodesk' ),
		'child'                => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'kodesk' ),
		'child-success%s'      => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'kodesk' ),
		'child-action-link'    => esc_html__( 'Learn about child themes', 'kodesk' ),
		'child-json-success%s' => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'kodesk' ),
		'child-json-already%s' => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'kodesk' ),

		'plugins-header'         => esc_html__( 'Install Plugins', 'kodesk' ),
		'plugins-header-success' => esc_html__( 'You\'re up to speed!', 'kodesk' ),
		'plugins'                => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'kodesk' ),
		'plugins-success%s'      => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'kodesk' ),
		'plugins-action-link'    => esc_html__( 'Advanced', 'kodesk' ),

		'import-header'      => esc_html__( 'Import Content', 'kodesk' ),
		'import'             => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'kodesk' ),
		'import-action-link' => esc_html__( 'Advanced', 'kodesk' ),

		'ready-header'      => esc_html__( 'All done. Have fun!', 'kodesk' ),

		/* translators: Theme Author */
		'ready%s'           => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'kodesk' ),
		'ready-action-link' => esc_html__( 'Extras', 'kodesk' ),
		'ready-big-button'  => esc_html__( 'View your website', 'kodesk' ),
		'ready-link-1'      => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://themeforest.net/user/template_path/', esc_html__( '5 Star For Project Kodesk', 'kodesk' ) ),
		'ready-link-2'      => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://template_path.com/support', esc_html__( 'Get Kodesk Theme Support', 'kodesk' ) ),
	)
);
