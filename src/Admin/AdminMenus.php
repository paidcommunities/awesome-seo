<?php

namespace AwesomeSEO\Admin;

use PaidCommunities\WordPress\PluginConfig;

class AdminMenus {

	private $license_page;

	private $setting_page;

	private $config;

	public function __construct( LicensePage $license_page, SettingsPage $settings, PluginConfig $config ) {
		$this->license_page = $license_page;
		$this->setting_page = $settings;
		$this->config       = $config;
		add_action( 'admin_menu', [ $this, 'add_menu' ] );
	}

	public function add_menu() {
		add_menu_page(
			__( 'Awesome SEO', 'awesome-seo' ),
			__( 'Awesome SEO', 'awesome-seo' ),
			'manage_options',
			'awesome-seo',
			null,
			null,
			'8.546'
		);

		$settings_page = add_submenu_page(
			'awesome-seo',
			__( 'License Management', 'awesome-seo' ),
			__( 'License Management', 'awesome-seo' ),
			'manage_options',
			'awesome-seo-license',
			[
				$this->license_page,
				'render'
			]
		);

		if ( $this->config->getLicense()->isActive() ) {
			add_submenu_page(
				'awesome-seo',
				__( 'Settings', 'awesome-seo' ),
				__( 'Settings', 'awesome-seo' ),
				'manage_options',
				'awesome-seo-settings',
				[
					$this->setting_page,
					'render'
				]
			);
		}

		add_action( 'load-' . $settings_page, [ $this->license_page, 'initialize' ] );

		// this removes the unwanted Awesome SEO submenu item that WordPress adds
		remove_submenu_page( 'awesome-seo', 'awesome-seo' );
	}

}