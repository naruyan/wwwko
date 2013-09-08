<?php defined('SYSPATH') or die('No direct script access.');

/**
 * LocationType model class. Provides location type names
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_LocationType extends ORM
{
    protected $_table_name = 'location_types';

    protected $_has_many = array(
        'locations' => array(
            'model'         => 'Location',
            'foreign_key'   => 'type',
        ),
    );

    public function rules()
    {
        return array(
            'type' => array(
                array('not_empty'),
                array('max_length', array(':value', 200)),
            ),
        );
    }
}



