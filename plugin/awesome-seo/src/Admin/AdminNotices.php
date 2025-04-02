<?php

namespace AwesomeSEO\Admin;

use PaidCommunities\WordPress\PluginConfig;

class AdminNotices {

	private $config;

	public function __construct( PluginConfig $config ) {
		$this->config = $config;
		add_action( 'admin_init', [ $this, 'check_license_status' ] );
	}

	public function check_license_status() {
		if ( $this->config->getLicense()->isInactive() ) {
			add_action( 'admin_notices', [ $this, 'render_expired_license_notice' ] );
		}
	}

	public function render_expired_license_notice() {
		?>
        <div class="notice notice-warning is-dismissible">
            <p><?php esc_html_e( 'Your Awesome SEO license is inactive.', 'awesome-seo' ) ?></p>
        </div>
		<?php
	}

}