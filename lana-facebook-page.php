<?php
/**
 * Plugin Name: Lana Facebook Page
 * Plugin URI: http://lana.codes/lana-product/lana-facebook-page/
 * Description: Facebook page plugin.
 * Version: 1.0.5
 * Author: Lana Codes
 * Author URI: http://lana.codes/
 * Text Domain: lana-facebook-page
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) or die();
define( 'LANA_FACEBOOK_PAGE_VERSION', '1.0.5' );
define( 'LANA_FACEBOOK_PAGE_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'LANA_FACEBOOK_PAGE_DIR_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Language
 * load
 */
load_plugin_textdomain( 'lana-facebook-page', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

/**
 * Lana Facebook Page Button Shortcode
 *
 * @param $atts
 *
 * @return string
 */
function lana_fb_page_shortcode( $atts ) {

	$a = shortcode_atts( array(
		'href'                  => '',
		'width'                 => 340,
		'height'                => 130,
		'tabs'                  => '',
		'hide_cover'            => 'false',
		'show_facepile'         => 'false',
		'small_header'          => 'false',
		'adapt_container_width' => 'true'
	), $atts );

	/** validate href */
	if ( empty( $a['href'] ) ) {
		return '';
	}

	/** validate width */
	$a['width'] = intval( $a['width'] );

	if ( $a['width'] < 180 || $a['width'] > 500 ) {
		$a['width'] = 340;
	}

	$width = $a['width'] . 'px';

	/** validate adaptive width */
	if ( 'true' == $a['adapt_container_width'] ) {
		$width = '100%';
	}

	/** validate height */
	$a['height'] = intval( $a['height'] );
	$height      = $a['height'] . 'px';

	/** validate tabs */
	if ( ! in_array( $a['tabs'], array( 'timeline', 'events', 'messages' ) ) ) {
		$a['tabs'] = '';
	}

	$output = '<iframe class="lana-facebook-page" src="https://www.facebook.com/plugins/page.php?' . http_build_query( $a ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';

	return $output;
}

add_shortcode( 'lana_fb_page', 'lana_fb_page_shortcode' );

/**
 * Init Widget
 */
add_action( 'widgets_init', function () {
	include_once LANA_FACEBOOK_PAGE_DIR_PATH . '/includes/class-lana-fb-page-widget.php';
	register_widget( 'Lana_Fb_Page_Widget' );
} );
