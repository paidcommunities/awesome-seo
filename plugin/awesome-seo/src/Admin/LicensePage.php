<?php

namespace AwesomeSEO\Admin;

use PaidCommunities\WordPress\PluginConfig;

class LicensePage {

	private $config;

	public function __construct( PluginConfig $config ) {
		$this->config = $config;
		add_action( 'admin_init', [ $this, 'register_scripts' ] );
	}

	public function register_scripts() {
		$url = plugin_dir_url( dirname( __DIR__ ), 2 );
		wp_register_script(
			'awesome-seo-admin-app',
			$url . 'build/admin-app.js',
			[ 'jquery', 'react', 'wp-components', 'paidcommunities-wp-api' ],
			$this->config->getVersion(),
			true
		);
	}

	public function initialize() {
		wp_enqueue_style( 'paidcommunities-wp-components' );
		wp_enqueue_style( 'wp-components' );
		wp_enqueue_script( 'paidcommunities-admin-license' );
		wp_enqueue_script( 'awesome-seo-admin-app' );

		wp_localize_script( 'awesome-seo-admin-app', 'awesomeSEOParams', $this->config->getPluginData() );
	}

	public function render() {
		?>
        <div class="awesome-seo-license-management">
            <div class="awesome-seo-title">
                <h1><?php esc_html_e( 'License Management', 'awesome-seo' ) ?></h1>
                <p>
					<?php esc_html_e( 'On this page you can activate or deactivate your Awesome SEO license.', 'awesome-seo' ) ?>
                </p>
            </div>
            <div>
                <h3><?php esc_html_e( 'PHP Template', 'awesome-seo' ) ?></h3>
                <p><?php esc_html_e( 'This is an example of the php template.', 'awesome-seo' ) ?></p>
            </div>
			<?php $this->config->getLicenseSettings()->render(); ?>
            <br>
            <br>
            <div>
                <h3><?php esc_html_e( 'React App', 'awesome-seo' ) ?></h3>
                <p><?php esc_html_e( 'This is an example of the react app.', 'awesome-seo' ) ?></p>
                <div id="app"></div>
            </div>
        </div>
		<?php
	}

}