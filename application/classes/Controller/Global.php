<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Global controller class. Base controller class
 *
 * @package     wwwko
 * @category    Controller
 * @author      Jonathan Lai
 */
abstract class Controller_Global extends Controller_Template
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
     * @var Header view
     */
    protected $header;

    /**
     * @var Footer view
     */
    protected $footer;

    /**
     * @var Template Options
     */
    protected $template_opts;



    /**
     * Load the user session info and settings
     */
    public function before()
    {
        parent::before();

        $this->template_opts = array();

        $this->user = Model::factory('ForumUser');
        $this->user->load($this->request);

        if (Kohana::$environment == Kohana::DEVELOPMENT && !$this->user->is_logged_in())
        {
            $debug = Kohana::$config->load('debug');
            $debug_user = $debug->get('userid');
            $debug_passkey = $debug->get('passkey');
            $this->user->debug_user($debug_user[$debug->get('login_level')], 
                $debug_passkey[$debug->get('login_level')]);
        }        
        
        $this->settings = array();
        $this->load_settings();

        $this->session = Session::instance();

        $this->template
            ->set('page_title', '')
            ->set('meta_content', '')
            ->set('css_content', '')
            ->set('head_content', '')
            ->set('header', '')
            ->set('header_content', '')
            ->set('body_content', '')
            ->set('footer_content', '')
            ->set('footer', '')
            ->set('script_content', '');
    }

    public function after()
    {
        if (!isset($this->template_opts['no_wrappers']))
        {
            $header = View::factory('header')
                ->set('home_active', isset($this->template_opts['home_active']) ? 'active' : '')
                ->set('home_url', Route::url("default"))
                ->set('members_active', isset($this->template_opts['members_active']) ? 'active' : '')
                ->set('members_list_url', Route::url("members", array('action' => 'list')))
                ->set('members_signup_url', Route::url("members", array('action' => 'signup')))
                ->set('clubsday_active', isset($this->template_opts['clubsday_active']) ? 'active' : '')
                ->set('clubsday_list_url', Route::url("clubsday", array('action' => 'list')))
                ->set('clubsday_signup_url', Route::url("clubsday", array('action' => 'signup')))
                ->set('inventory_active', isset($this->template_opts['inventory_active']) ? 'active' : '')
                ->set('inventory_url', Route::url("inventory"))
                ->set('sales_active', isset($this->template_opts['sales_active']) ? 'active' : '')
                ->set('sales_list_url', Route::url("sales", array('action' => 'list')))
                ->set('sales_add_url', Route::url("sales", array('action' => 'add')))
                // Make this a setting
                ->set('signin_url', 'http://www.ctrl-a.org/forum/member.php?action=login')
                ->set('is_exec', $this->user->is_exec())
                ->set('is_logged_in', $this->user->is_logged_in())
                ->set('username', $this->user->username());

            $footer = View::factory('footer');

            $this->template
                ->set('header', $header)
                ->set('footer', $footer);
        }

        parent::after();
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
