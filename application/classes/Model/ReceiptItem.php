<?php defined('SYSPATH') or die('No direct script access.');

/**
 * ReceiptItem model class. Provides access to individual items on receipts.
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_ReceiptItem extends ORM
{
    protected $_table_name = 'receipt_items'
    protected $_belongs_to = array(
        'receipt' => array(
            'model'         => 'Receipt',
            'foreign_key'   => 'receipt',
        ),
        'item' => array(
            'model'         => 'Item',
            'foreign_key'   => 'item',
        ),
    );
}

