<?php defined('ABSPATH') || die;
/**
 * speedup iranian dashboard test 
 *
 * @author            HosseinJavan
 * @copyright         HosseinJavan
 * @license           HosseinJavan
 *
 * @wordpress-plugin
 *
 * Plugin Name:         Speedup
 * Plugin URI:          https://www.io-marketing.net/
 * Description:         speedup iranian dashboard test 
 * Version:             1.2.0
 * Requires at least:   5.0
 * Requires PHP:        7.2
 * Author:              HosseinJavan
 * Author URI:          https://www.io-marketing.net/
 * License:             HosseinJavan
 * License URI:         https://www.io-marketing.net/
 * Text Domain:         KNOX
 * Domain Path:         /languages
 */



function TxString($text, $string) {
	return strpos($text, $string) !== false;
}


function TxBXHR ($false, $parsed_args, $url) {
	$blockedHosts = [
		'elementor.com',
		'github.com',
		'yoast.com',
		'yoa.st',
		'api.wordpress.org',
		'w.org',
		'unyson.io',
		'siteorigin.com',
		'woocommerce.com'
	];

	foreach ( $blockedHosts as $host ) {
		if ( !empty($host) && TxString($url, $host) ) {
			return [
				'headers'  => '',
				'body'     => '',
				'response' => '',
				'cookies'  => '',
				'filename' => ''
			];
		}
	}

	return $false;
}
add_filter('pre_http_request', 'TxBXHR', 10, 3);