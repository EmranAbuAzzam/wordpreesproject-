<?php
/*
Plugin Name: GrandPrix Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Mikado Themes
Version: 2.1
*/
define('GRANDPRIX_INSTAGRAM_FEED_VERSION', '2.1');
define('GRANDPRIX_INSTAGRAM_ABS_PATH', dirname(__FILE__));
define('GRANDPRIX_INSTAGRAM_REL_PATH', dirname(plugin_basename(__FILE__ )));
define( 'GRANDPRIX_INSTAGRAM_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'GRANDPRIX_INSTAGRAM_ASSETS_PATH', GRANDPRIX_INSTAGRAM_ABS_PATH . '/assets' );
define( 'GRANDPRIX_INSTAGRAM_ASSETS_URL_PATH', GRANDPRIX_INSTAGRAM_URL_PATH . 'assets' );
define( 'GRANDPRIX_INSTAGRAM_SHORTCODES_PATH', GRANDPRIX_INSTAGRAM_ABS_PATH . '/shortcodes' );
define( 'GRANDPRIX_INSTAGRAM_SHORTCODES_URL_PATH', GRANDPRIX_INSTAGRAM_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'grandprix_instagram_theme_installed' ) ) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function grandprix_instagram_theme_installed() {
        return defined( 'GRANDPRIX_MIKADO_ROOT' );
    }
}

if ( ! function_exists( 'grandprix_instagram_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function grandprix_instagram_feed_text_domain() {
		load_plugin_textdomain( 'grandprix-instagram-feed', false, GRANDPRIX_INSTAGRAM_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'grandprix_instagram_feed_text_domain' );
}
