<?php

use Symfony\Component\Routing;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create routes for app
 *
 * - Uses Symfony Routing component
 * - Set either a closure or call to controller
 * - Route name maps to template name to render
 * - Used wherever front.php file is included, such as in wp template_redirect hook
 *
 *
 * @package      wp-symfony-router
 * @subpackage   routes
 * @since        0.0.1
 * @author       Josh Visick <josh@visickdesign.net>
 */


//create route collection
$routes = new Routing\RouteCollection();

/**
 * Sample routes
 *
 * order matters here!
 */


/**
 * Route forwarded to controller with last segment of url added as param
 */
$routes->add( 'sample-controller', new Route( 'sample-controller/{var_id}', array(
    'var_id' => null,
    '_controller' => '\wpSymfonyRouter\controllers\SampleController::sampleAction',
)));


/**
 * Add controller inline as closure and set page render here directly
 */
$routes->add( 'sample-inline-controller', new Route( 'sample-inline-controller/', array(
    '_controller' => function( Request $request ) {
        return jv_render_template( $request );
    },
)) );


/**
 * straight redirect with closure and wp_redirect
 */
$routes->add( 'sample-redirect', new Route( 'some/page/', array(
    '_controller' => function ( Request $request ) {
        wp_redirect( site_url() . '/another/page' );
        exit;
    }
)));


/**
 * Handle root and any other routes
 *
 * Set to 404 response and allow app front to send back to wp
 */
//if index return not found
$routes->add( 'index', new Route( '/', array(
    '_controller' => function( Request $request ) {
        return $response = new Response( 'catch-all', 404 );
    }), array(
    'url' => '.',
)));

//if not found return 404
$routes->add( 'not-found', new Route( '/{url}', array(
    '_controller' => function( Request $request ) {
        return $response = new Response( 'catch-all', 404 );
    }), array(
    'url' => '.+',
)));

return $routes;