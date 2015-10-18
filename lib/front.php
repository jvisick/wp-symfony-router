<?php
use wpSymfonyRouter\framework\Framework;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Front file for app
 *
 * Grabs request and sets up routing to output response
 * Uses Symfony httpfoundation and routing components
 *
 * @package      wp-symfony-router
 * @subpackage   front
 * @since        0.0.1
 * @author       Josh Visick <josh@visickdesign.net>
 */

/**
 * Render template passed from controller
 *
 * @param $request
 * @param null $data
 *
 * @return Response
 */
function jv_render_template($request, $data=null ) {

    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/templates/%s.php', $_route);

    return new Response(ob_get_clean());
}

//create request object
$request = Request::createFromGlobals();
//get app routes
$routes = include __DIR__.'/routes.php';

//setup urlmatcher & controller resolver
$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();

//setup dispatcher and add route listener
$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher));
//add string response listener
$dispatcher->addSubscriber(new wpSymfonyRouter\framework\StringResponseListener());

//add custom exception listener to return response w/ error msg/status
$listener = new HttpKernel\EventListener\ExceptionListener('wpSymphonyRouter\\Framework\\ErrorController::exceptionAction');
$dispatcher->addSubscriber($listener);

//make sure response is in correct charset
$dispatcher->addSubscriber(new HttpKernel\EventListener\ResponseListener('UTF-8'));

//setup framework kernel
$framework = new Framework($dispatcher, $resolver);
//handle response
$response = $framework->handle($request);

//handle if no route match found
if ( $response->getStatusCode() == 404 ) {

    //if no route found do noting and let wp continue
    return;
}

//send the response to the browser and exit app
$response->send();
exit;