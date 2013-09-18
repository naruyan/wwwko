<?php defined('SYSPATH') or die('No direct script access.');

/**
 * MailingList model class. Provides access to individual mailing list entries
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_MailingList extends ORM
{
    protected $_table_name = 'mailinglist';

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
            'email' => array(
                array('max_length', array(':value', 200)),
                array('email',  array(':value')),
                array(array($this, 'unique'), array(':field', ':value')),
            )
        );
    }
}
