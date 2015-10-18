<?php
use ccpdt\controllers\MemberController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Adds template redirects
 *
 * For app pages not in WP, uses template_redirect hook to run through app router first before completing WP page life-cycle
 *
 * @package      wp-symfony-router
 * @subpackage   template-redirects
 * @since        0.0.1
 */


//hook into template_redirect and output any app route responses
add_action('template_redirect', 'jv_template_redirect');


/**
 * hijacks wp query before loading template
 *
 * @param $wp
 *
 * @return void
 */
function jv_template_redirect($wp) {

    //load up app to parse route and output page response
    //does nothing if no match met
    require_once( JV_DIR . '/lib/front.php');
}


