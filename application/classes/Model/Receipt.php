<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Receipt model class. Provides access to purchase receipts.
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_Receipt extends ORM
{
    protected $_belongs_to = array(
        'buyer' => array(
            'model'         => 'Member',
            'foreign_key'   => 'buyer_id',
        ),
    );

    protected $_has_many = array(
        'receipt_items' => array(
            'model'         => 'ReceiptItem',
            'foreign_key'   => 'receipt',
        ),
    );
}


