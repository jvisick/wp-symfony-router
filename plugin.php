<?php
/**
 * Plugin Name: JV WP-Symfony Router
 * Plugin URI: http://www.visickdesign.com
 * Description: This is an approach to using a symfony based router within a WordPress installation.
 * Version: 0.0.1
 * Author: Josh Visick
 * Author URI: http://www.visickdesign.com
 *
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