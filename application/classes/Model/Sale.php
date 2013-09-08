<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Sale model class. Provides access to item sales.
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_Sale extends ORM
{
    protected $_belongs_to = array(
        'seller' => array(
            'model'         => 'Member',
            'foreign_key'   => 'seller',
        ),
        'buyer' => array(
            'model'         => 'Member',
            'foreign_key'   => 'buyer',
        ),
    );

    protected $_has_many = array(
        'sale_items' => array(
            'model'         => 'SalesItem',
            'foreign_key'   => 'sale',
        ),
    );
}

