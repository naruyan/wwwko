<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Global controller class. Base controller class
 *
 * @package     wwwko
 * @category    Controller
 * @author      Jonathan Lai
 */
abstract class Controller_Global extends Controller 
{
    /**
     * @var User info
     */
    protected $user;

    /**
     * @var Club Manager Settings ORM object
     */
    protected $settings;

    /**
     * @var Session object
     */
    protected $session;

    /**
     * Load the user session info and settings
     */
    public function before()
    {
        $this->user = Model::factory('ForumUser');
        $this->user->load();

        if (Kohana::$environment == Kohana::DEVELOPMENT && !$this->user->is_logged_in())
        {
            $debug = Kohana::$config->load('debug');
            $debug_user = $debug->get('userid');
            $debug_passkey = $debug->get('passkey')
            $this->user->debug_user($debug_user[$debug->get('login_level')], 
                $debug_passkey[$debug->get('login_level')]);
        }        
        
        $this->settings = array();
        $this->load_settings();

        $this->session = Session::instance();
    }

    /**
     * Load settings
     */
    public function load_settings()
    {
        $obj = ORM::factory('Setting');
        $records = $obj->find_all();
        foreach ($records as $record)
        {
            $this->settings[$record->name] = $record->value;
        }
    }
}
