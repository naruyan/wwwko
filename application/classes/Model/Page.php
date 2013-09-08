<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Page model class. Provides access to custom information pages.
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_Page extends ORM
{
    protected $_primary_key = 'name';
    
    public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 200)),
                array(array($this, 'unique'), array(':field', ':value')),
            ),
            'read_perm' => array(
                array('digit'),
            ),
            'write_perm' => array(
                array('digit'),
            ),
        );
    }
}



