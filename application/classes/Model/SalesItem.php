<?php defined('SYSPATH') or die('No direct script access.');

/**
 * SalesItem model class. Provides access to individual item sales.
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_SalesItem extends ORM
{
    protected $_table_name = 'sales_items'
    protected $_belongs_to = array(
        'sale' => array(
            'model'         => 'Sale',
            'foreign_key'   => 'sale',
        ),
        'item' => array(
            'model'         => 'Item',
            'foreign_key'   => 'item',
        ),
    );

    //TODO Validation Rules (Actually, need to do lots of conditional rules for all)
}

