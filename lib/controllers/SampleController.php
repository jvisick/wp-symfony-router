<?php
/**
 * Controller for event listings
 *
 * @package      wp-symfony-router
 * @subpackage   controllers
 * @since        0.0.1
 * @author       Josh Visick <josh@visickdesign.net>
 */

namespace wpSymfonyRouter\controllers;

use wpSymfonyRouter\models\SampleModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Tests\Controller;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class SampleController {

    /**
     * Controller for sample page
     *
     * @return string $content
     */
    public function sampleAction( Request $request ) {

        //get date from model, pass var_id to model
        $model = new SampleModel();
        $data = $model->getSampleData( $request->attributes->get( 'var_id' ) );

        //send request object and data to template
        return jv_render_template($request, $data);
    }

}