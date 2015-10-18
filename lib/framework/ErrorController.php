<?php
/**
 * Error handlers
 *
 * if there is exception send response with error message and status code
 *
 * @package      wp-symfony-router
 * @subpackage   framework
 * @since        0.0.1
 * @author       Josh Visick <josh@visickdesign.net>
 */

namespace wpSymfonyRouter\framework;

use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ErrorController
{
    public function exceptionAction(FlattenException $exception)
    {
        $msg = 'Something went wrong! ('.$exception->getMessage().')';

        return new Response($msg, $exception->getStatusCode());
    }
}