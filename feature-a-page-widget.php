<?php
/**
* Plugin Name: Feature a Page Widget
* Description: Feature a single page in any sidebar.
* Plugin URI: http://mrwweb.com/feature-a-page-widget-plugin-wordpress/
* Version: 2.0.0-beta
* Author: Mark Root-Wiley (MRWweb)
* Author URI: http://mrwweb.com
* Donate Link: https://www.networkforgood.org/donation/MakeDonation.aspx?ORGID2=522061398
* License: GPLv2 or later
* Text Domain: feature-a-page-widget
* Domain Path: /languages
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

// Setup & Load Assets
require_once( 'inc/fpw_init.php' );

// Resolve Conflicts with Popular Plugins & Themes when possible
require_once( 'inc/fpw_resolve_conflicts.php' );

// Contextual Help
require_once( 'inc/fpw_help.php' );

// Helper Functions
require_once( 'inc/fpw_helper_functions.php' );

// Template Tags
require_once( 'inc/fpw_template_tags.php' );

// Widget Class
require_once( 'inc/fpw_widget.class.php' );