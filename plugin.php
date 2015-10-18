<?php
/**
 * Plugin Name: JV WP-Symfony Router
 * Plugin URI: http://www.visickdesign.com
 * Description: This is an approach to using a symfony based router within a WordPress installation.
 * Version: 0.0.1
 * Author: Josh Visick
 * Author URI: http://www.visickdesign.com
 *
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * JV WP-Symfony Router is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * JV WP-Symfony Router is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Plugin Directory
define( 'JV_DIR', dirname( __FILE__ ) );

//Composer Autoloader
require( JV_DIR . '/vendor/autoload.php' );

// Templates folder
define( 'JV_DIR_TEMPLATES', JV_DIR . '/lib/templates/' );

// Template Redirects
include_once( JV_DIR . '/lib/template_redirects.php' );