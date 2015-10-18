<?php
/**
 * String response listener
 *
 * if the response is a string, convert it to a proper Response object
 *
 * @package      wp-symfony-router
 * @subpackage   framework
 * @since        0.0.1
 * @author       Josh Visick <josh@visickdesign.net>
 */

namespace wpSymfonyRouter\framework;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpFoundation\Response;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class StringResponseListener implements EventSubscriberInterface {

    public function onView(GetResponseForControllerResultEvent $event) {

        $response = $event->getControllerResult();

        if (is_string($response)) {
            $event->setResponse(new Response($response));
        }
    }

    public static function getSubscribedEvents() {

        return array('kernel.view' => 'onView');
    }

}
