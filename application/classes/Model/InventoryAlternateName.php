<?php defined('SYSPATH') or die('No direct script access.');

/**
 * InventoryAlternateName model class. Provides access to alternate names for inventory
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_InventoryAlternateName extends ORM
{
    protected $_table_name = 'inventory_alternate_names';

    protected $_belongs_to = array(
        'inventory' => array(
            'model'         => 'Inventory',
            'foreign_key'   => 'inventory_id',
        ),
    );

    public function rules()
    {
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 200)),
                array(array($this, 'unique'), array(':field', ':value')),
            ),
        );
    }
}
