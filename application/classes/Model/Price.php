<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Price model class. Provides access to item prices.
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_Price extends ORM
{
    protected $_has_one = array(
        'inventory' => array(
            'model'         => 'Inventory',
            'foreign_key'   => 'inventory_id',
        ),
    );

    protected $_has_many = array(
        'items' => array(
            'model'         => 'Item',
            'through'       => 'item_prices',
        ),
    );
}

