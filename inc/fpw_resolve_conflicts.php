<?php
/**
 * Custom functions that attempt to resolve plugin-specific issues
 * 
 * These won't be added for everyone conflict. Just for particularly popular plugins.
 * 
 * Specific plugins with issues addressed
 * 		- Jetpack
 *	  	- Digg Digg
 *	   	- podPress
 * 
 * @package feature_a_page_widget
 * @author  Mark Root-Wiley (info@MRWweb.com)
 * @link    http://wordpress.org/plugins/feature-a-page-widget
 * @since   2.0.0
 * @license http://www.gnu.org/licenses/gpl-2.0.html    GPLv2 or later
 */
/**
 * Remove Jetpack Sharing Buttons from Excerpt in Widget
 */
function fpw_remove_jetpack_sharing_buttons() {
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_action( 'fpw_loop_start', 'fpw_remove_jetpack_sharing_buttons' );
function fpw_add_jetpack_sharing_buttons() {
    add_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_action( 'fpw_loop_end', 'fpw_add_jetpack_sharing_buttons' );

/**
 * diggdigg compatibility, removes errors from excerpt in widget
 */
function fpw_remove_diggdigg() {
	remove_filter('the_excerpt', 'dd_hook_wp_content');
}
add_action('fpw_loop_start', 'fpw_remove_diggdigg');
function fpw_add_diggdigg() {
	add_filter('the_excerpt', 'dd_hook_wp_content');
}
add_action('fpw_loop_end', 'fpw_add_diggdigg');

/**
 * podpress compatibility, remove play from widget excerpts
 */
function fpw_remove_podpress() {
	global $podPress;
	remove_action( 'the_excerpt', array( $podPress, 'insert_the_excerptplayer' ) );
}
add_action( 'fpw_loop_start', 'fpw_remove_podpress' );
function fpw_add_podpress() {
	global $podPress;
	add_action( 'the_excerpt', array( $podPress, 'insert_the_excerptplayer' ) );
}
add_action( 'fpw_loop_end', 'fpw_add_podpress' );