<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Member Status model class. Provides access to member status enumerations
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_MemberStatus extends ORM
{
    protected $_table_name = 'member_statuses';    
    protected $_has_many = array(
        'members' => array(
            'model'         => 'Member',
            'foreign_key'   => 'id',
        ),
    );
}

