<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Inventory model class. Provides access to inventory records
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_Inventory extends ORM
{
    protected $_table_name = 'inventory';

    protected $_has_many = array(
        'alternate_names' => array(
            'model'         => 'InventoryAlternateName',
            'foreign_key'   => 'inventory_id',
        ),
        'items' => array(
            'model'         => 'Item',
            'foreign_key'   => 'inventory_id',
        ),
        'prices' => array(
            'model'         => 'Price',
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
            'description' => array(
                array('max_length', array(':value', 1000)),
            ),
        );
    }
}
                
