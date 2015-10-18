<?php
/**
 * Model for events listings
 *
 * @package      wp-symfony-router
 * @subpackage   models
 * @since        0.0.1
 * @link         http://www.visickdesign.com
 * @author       Josh Visick <josh@visickdesign.com>
 */

namespace wpSymfonyRouter\models;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SampleModel {

    /**
     * Get sample data
     *
     * @param string|int $id
     *
     * @return mixed $query
     */
    public function getSampleData( $id = '' ) {

        //Get data however you need...

        $query = 'sample data, var_id: ' . $id;

        return $query;
    }

}