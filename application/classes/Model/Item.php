<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Item model class. Provides access to specific inventory items
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_Item extends ORM
{
    protected $_belongs_to = array(
        'inventory' => array(
            'model'         => 'Inventory',
            'foreign_key'   => 'inventory_id',
        ),
        'location' => array(
            'model'         => 'Location',
            'foreign_key'   => 'location',
        ),
    );

    protected $_has_many = array(
        'prices' => array(
            'model'         => 'Price',
            'through'       => 'item_prices',
        ),
        'sales' => array(
            'model'         => 'SalesItem',
            'foreign_key'   => 'item',
        ),
        'receipts' => array(
            'model'         => 'ReceiptItem',
            'foreign_key'   => 'item',
        ),
    );

    public function rules()
    {
        return array(
            'description' => array(
                array('max_length', array(':value', 200)),
            ),
        );
    }
}

