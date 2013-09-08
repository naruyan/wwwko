<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Location model class. Provides access to location records
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_Location extends ORM
{
    protected $_belongs_to = array(
        'location_type' => array(
            'model'         => 'LocationType',
            'foreign_key'   => 'type',
        ),
    );

    protected $_has_many = array(
        'items' => array(
            'model'         => 'Item',
            'foreign_key'   => 'location',
        ),
    );

    public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 200)),
            ),
            'description' => array(
                array('max_length', array(':value', 1000)),
            ),
        );
    }
}


