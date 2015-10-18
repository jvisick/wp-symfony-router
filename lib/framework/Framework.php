<?php
/**
 * Framework kernel for managing app
 *
 * - Handles requests and outputs correct response
 * - Uses Symfony HttpKernel
 *
 * @package      wp-symfony-router
 * @subpackage   framework
 * @since        0.0.1
 * @author       Josh Visick <josh@visickdesign.net>
 */

namespace wpSymfonyRouter\framework;

use Symfony\Component\HttpKernel\HttpKernel;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Framework extends HttpKernel {

    //...

}