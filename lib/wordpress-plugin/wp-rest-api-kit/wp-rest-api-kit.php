<?php
/**
 * Plugin Name: WP Rest API Kit
 * Plugin URI:
 * Description:
 * Version:     0.1.0
 * Author:      Webnist
 * Author URI:  https://profiles.wordpress.org/webnist
 * License: GPLv2 or later
 * Text Domain: wp_rest_api_kit
 * Domain Path: /languages
 */

if ( ! class_exists( 'WPRestAPIKitAdmin' ) )
	require_once( dirname(__FILE__) . '/includes/admin.php' );

if ( ! class_exists( 'WPRestAPIKitFilter' ) )
	require_once( dirname(__FILE__) . '/includes/filter.php' );


if ( ! class_exists( 'WPRestAPIKitEndpointQuery' ) )
	require_once( dirname(__FILE__) . '/includes/query-endpoint.php' );

if ( ! class_exists( 'WPRestAPIKitEndpointMenus' ) )
	require_once( dirname(__FILE__) . '/includes/menus-endpoint.php' );

class WPRestAPIKitEndpointInit {

	public function __construct() {

		// Base Set
		$this->basename = dirname( plugin_basename(__FILE__) );
		$this->dir      = plugin_dir_path( __FILE__ );
		$this->url      = plugin_dir_url( __FILE__ );
		$headers        = array(
			'name'        => 'Plugin Name',
			'version'     => 'Version',
			'domain'      => 'Text Domain',
			'domain_path' => 'Domain Path',
		);
		$data              = get_file_data( __FILE__, $headers );
		$this->name        = $data['name'];
		$this->version     = $data['version'];
		$this->domain      = $data['domain'];
		$this->domain_path = $data['domain_path'];

		// Options
		$this->default_options = array(
			'access_control_allow_origin_all' => 0,
			'destination_url'                 => '',
		);
		$this->options                         = get_option( 'wp_rest_api_kit', $this->default_options );
		$this->destination_url                 = $this->options['destination_url'] ? $this->options['destination_url'] : '';

		// Load textdomain
		load_plugin_textdomain( $this->domain, false, $this->name . $this->domain_path );
	}

}
new WPRestAPIKitEndpointInit();
new WPRestAPIKitAdmin();
new WPRestAPIKitFilter();
new WPRestAPIKitEndpointQuery();
new WPRestAPIKitEndpointMenus();
