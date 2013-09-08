<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Member model class. Provides access to individual member information on the list
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_Member extends ORM
{
    protected $_belongs_to = array(
        'status_text' => array(
            'model'         => 'MemberStatus',
            'foreign_key'   => 'status',
        ),
    );

    protected $_has_many = array(
        'sales' => array(
            'model'         => 'Sale',
            'foreign_key'   => 'seller',
        ),
        'purchases' => array(
            'model'         => 'Sale',
            'foreign_key'   => 'buyer',
        ),
        'receipts' = array(
            'model'         => 'Receipt',
            'foreign_key'   => 'buyer_id',
        ),
    );

    public function rules()
    {
        return array(
            'term' => array(
                array('not_empty'),
                array('digit'),
                array(function($val)
                {
                    return (intval($val) > 0);
                }, array(':value')),
            ),
            'number' => array(
                array('not_empty'),
                array(array($this, 'unique_number')),
                array('max_length', array(':value', 100)),
            ),
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 100)),
            ),
            'email' => array(
                array('max_length', array(':value', 200)),
                array(array($this, 'email_valid'), array(':value')),
            )
        );
    }

    public function unique_number()
    {
        $model = ORM::factory($this->object_name())
            ->where('term', '=', $this->term)
            ->and_where('number', '=', $this->number)
            ->find();

        if ($this->loaded())
        {
            return (!($model->loaded() && $model->pk() != $this->pk()));
        }

        return (!$model->loaded());
    }

    public function email_valid($email)
    {
        if (Valid::not_empty($email) && !Valid::email($email))
        {
            return false;
        }
        return true;
    }
}
