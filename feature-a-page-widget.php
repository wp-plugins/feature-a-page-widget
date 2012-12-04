<?php
/**
* Plugin Name: Feature a Page Widget
* Description: Feature a single page in any sidebar.
* Plugin URI: http://mrwweb.com/feature-a-page-widget-plugin-wordpress/
* Version: 1.1.0
* Author: Mark Root-Wiley (MRWweb)
* Author URI: http://mrwweb.com
* Donate Link: https://www.networkforgood.org/donation/MakeDonation.aspx?ORGID2=522061398
* License: GPLv2 or later
* Text Domain: fapw
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public Licchosense
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// because...
defined('ABSPATH') or die("Cannot access pages directly.");

define('FPW_VERSION', '1.0.0');

function fpw_update_version() {
	// Update the Plugin Version if it doesn't exist or is out of sync
	$fpw_options = get_option( 'fpw_options' );
	if( !isset( $fpw_options['version'] ) || $fpw_options['version'] != FPW_VERSION ) {
		$fpw_options['version'] = FPW_VERSION;
		update_option( 'fpw_options', $fpw_options );
	}
}

function fpw_activate() {
	fpw_update_version();
}

function fpw_upgrade() {
	fpw_update_version();
}

function fpw_uninstall() {
	// Delete Plugin Options on Uninstall
	delete_option( 'fpw_options' );
}

function fpw_admin_scripts( $hook ) {
	// Keep the rest of WordPress snappy. Only run on the widgets.php page.
	if( 'widgets.php' == $hook ) {
		// The Chosen jQuery Plugin - http://harvesthq.github.com/chosen/
		wp_enqueue_script( 'fpw_chosen_js', plugins_url( 'chosen/chosen.jquery.min.js', __FILE__ ), array( 'jquery' ), '0.9.8' );
		wp_enqueue_style( 'fpw_chosen_css', plugins_url( 'chosen/chosen.css', __FILE__ ), false, '0.9.8' );

		// Plugin JS
		wp_enqueue_script( 'fpw_admin_js', plugins_url( 'js/fpw_admin.js', __FILE__ ), array( 'jquery', 'fpw_chosen_js' ), FPW_VERSION );
		// Plugin CSS
		wp_enqueue_style( 'fpw_admin_css', plugins_url( 'css/fpw_admin.css', __FILE__ ), false, FPW_VERSION );
	}
}

// enqueue styles to layout widget on front end
function fpw_styles() {
	wp_enqueue_style( 'fpw_styles_css', plugins_url( 'css/fpw_styles.css', __FILE__), false, FPW_VERSION );
}

// Register necessary features to make this work
// hooked at late but reasonable priority to try to override themes
function fpw_page_supports() {
	// Enable core WP features on pages to allow widget to function
	add_theme_support( 'post-thumbnails' );
	add_post_type_support( 'page', 'excerpt' );
	add_post_type_support( 'page', 'thumbnail' );
	// For the "Wrapped" layout
	add_image_size( 'fpw_square', 200, 200, true );
	// For the "Banner" layout
	add_image_size( 'fpw_banner', 400, 150, true );
	// For the "Big" layout
	add_image_size( 'fpw_big', 400, 600 );
}

// any languages files
function fpw_textdomain() {
	load_plugin_textdomain( 'fapw', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

// Here we go. Register the widget. It's in fpw_widget.class.php.
function fpw_register_widget() {
	register_widget( 'FPW_Widget' );
}

// Activation, Upgrade, and Deactivation
register_activation_hook( __FILE__, 'fpw_activate' );
add_action( __FILE__, 'fpw_upgrade' );
register_uninstall_hook( __FILE__, 'fpw_uninstall' );

// Load Scripts and Styles
add_action( 'admin_enqueue_scripts', 'fpw_admin_scripts' );
add_action( 'wp_enqueue_scripts', 'fpw_styles' );

// Enable Excerpts, Post Thumbnails, and Custom Image Sizes. Load textdomain
add_action( 'init', 'fpw_page_supports', 20 );
add_action('plugins_loaded', 'fpw_textdomain');

// Register the widget class
add_action( 'widgets_init', 'fpw_register_widget' );

require_once ( 'fpw_widget.class.php' );