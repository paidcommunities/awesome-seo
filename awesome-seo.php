<?php
/**
 * Plugin Name: Awesome SEO
 * Plugin URI: https://awesome-seo.com
 * Description: SEO plugin that will increase site ranking
 * Version: 1.0.0
 * Author: PaidCommunities support@paidcommunities.com
 * Author URI: https://awesome-seo.com/about-us
 * Text Domain: awesome-seo
 * Domain Path: /i18n/languages/
 * Tested up to: 6.6
 * WC requires at least: 3.0.0
 * Update URI: https://paidcommunities.com
 */

require __DIR__ . '/vendor/autoload.php';

$config = new \PaidCommunities\WordPress\PluginConfig(
	plugin_basename( __FILE__ ),
	'1.0.0',
	[
		'template_path' => __DIR__ . '/templates'
	]
);

$config->environment( 'sandbox' );

new \AwesomeSEO\Admin\AdminMenus(
	new \AwesomeSEO\Admin\LicensePage( $config ),
	new \AwesomeSEO\Admin\SettingsPage(),
	$config
);

new \AwesomeSEO\Admin\AdminNotices( $config );