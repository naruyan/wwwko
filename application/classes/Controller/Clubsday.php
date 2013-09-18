<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Clubs Day controller class. Handles self signup of members and mailing list
 *
 * @package     wwwko
 * @category    Controller
 * @author      Jonathan Lai
 */
class Controller_Clubsday extends Controller_Global 
{
    /**
     * @var Club term of interest
     */
    private $term;

    public function before()
    {
        parent::before();
        
        $u_term = $this->request->param('term', $this->settings['term']);

        if (is_numeric($u_term))
        {
            $term = intval($u_term);
            if ($term < 1 || $term > $this->settings['term'])
            {
                $term = $this->settings['term'];
            }
        }
        else
        {
            $term = CM_DB::term_to_num($u_term);
            if (!$term)
            {
                $term = $this->settings['term'];
            }
        }
        
        $this->term_num = $term;
        $this->term = CM_DB::num_to_term($term);
    }

    public function action_splash()
    {
        $o_title = Kohana::message('global', 'club_name') . ' ' . 
            $this->term . ' ' . Kohana::message('clubsday', 'splash_title');

        $a_members_url = Route::url("members", array(
            'action' => 'signup',
            'term' => $this->term,
            'id' => 0,
            'repeat' => 'repeat',
        ));
        $a_mailinglist_url = Route::url("clubsday", array(
            'action' => 'signup',
            'term' => $this->term,
            'repeat' => 'repeat',
        ));
        
        $this->template->page_title = $o_title;
        $this->template->body_content = View::factory('clubsday_splash')
            ->bind('title', $o_title)
            ->bind('members_url', $a_members_url)
            ->bind('mailinglist_url', $a_mailinglist_url);
        
        $this->session->set('previous_controller', 'clubsday');
        $this->session->set('previous_param', array('action' => 'splash'));
    }

	public function action_list()
    {
        $members = ORM::factory('MailingList');

        $list = $members->where('term', '=', $this->term_num)->find_all();

        $a_members_url = Route::url("members", array(
            'action' => 'list',
            'term' => $this->term,
        ));

        $a_change_terms_url = Route::url("clubsday", array('action' => 'change_terms'));

        $member_list = array();
        foreach ($list as $member)
        {
            $member_list[] = $member["email"];
        }

        $o_title = Kohana::message('global', 'club_name') . ' ' . 
            $this->term . ' ' . Kohana::message('clubsday', 'list_title');

        $this->template->page_title = $o_title;
        $this->template->body_content = View::factory('clubsday_list')
            ->bind('title', $o_title)
            ->bind('term', $this->term)
            ->bind('member_list', $member_list)
            ->set('is_exec', $this->user->is_exec());

        $this->template->footer_content = View::factory('clubsday_list_footer')
            ->bind('term', $this->term)
            ->bind('members_url', $a_members_url)
            ->bind('change_terms_url', $a_change_terms_url)
            ->set('is_exec', $this->user->is_exec());

        $this->session->set('previous_controller', 'clubsday');
        $this->session->set('previous_param', array('action' => 'list'));
    }

    public function action_change_terms()
    {
        $u_term = $this->request->post('term');
        $a_term = urlencode($u_term);
        
        $this->redirect(Route::get("clubsday")->uri(array(
            'action' => 'list',
            'term' => $a_term,
        )));
    }

    public function action_signup()
    {
        $this->session->set('redirect_controller', 'clubsday');
        $this->session->set('redirect_param', array('action' => 'list'));
        $this->session->set('redirect_param_repeat', array('action' => 'splash'));
        $a_target = Route::url("clubsday", array(
            'action' => 'signup_sub',
            'term' => $this->term,
        ));

        $a_back = CM_Route::build_back($this->session, 
            $this->session->get('redirect_controller'), $this->session->get('redirect_param'));

        if ($this->request->param('repeat'))
        {
            $o_repeat = "checked";
        }

        $o_title = Kohana::message('global', 'club_name') . ' ' . 
            $this->term . ' ' . Kohana::message('clubsday', 'signup_title');
        $this->template->page_title = $o_title;

        $this->template->body_content = View::factory('clubsday_signup')
            ->bind('title', $o_title)
            ->bind('term', $this->term)
            ->bind('target', $a_target)
            ->bind('repeat', $o_repeat)
            ->set('is_exec', $this->user->is_exec())
            ->bind('back', $a_back);
    }

    public function action_signup_sub()
    {
        // Process the redirect
        if (!$this->request->post('repeat'))
        {
            $a_redirect = CM_Route::build_redirect($this->session, 'clubsday');
            $this->session->get_once('redirect_param_repeat');
        }
        else
        {
            $a_redirect = CM_Route::build_redirect($this->session, 'clubsday', array(), 'redirect_param_repeat');
            $this->session->get_once('redirect_param');
        }

        if ($this->settings['term'] != $this->term_num && $this->user->is_exec())
        {
            $term = $this->term_num;
        }
        else
        {
            $term = $this->settings['term'];
        }

        $u_email = $this->request->post('email');

        $member = ORM::factory('MailingList');

        $member->term = $term;
        $member->email = $u_email;

        try
        {
            $member->save();
            $o_notice = Kohana::message('clubsday', 'signup_success');
            $o_notice_type = 'success';
        }
        catch (ORM_Validation_Exception $e)
        {
            $o_errors = $e->errors('orm');
            $o_notice = Kohana::message('clubsday', 'signup_failure') . "\n<ul><li>" . implode("</li><li>", $o_errors) . "</li></ul>";
            $o_notice_type = 'danger';
        }

        $response = Request::factory(Route::get("redirect")->uri(array(
            'delay'     => 1,
        )))
            ->post('redirect', $a_redirect)
            ->post('notice', $o_notice)
            ->post('notice_type', $o_notice_type)
            ->execute();

        $this->auto_render = FALSE;
        $this->response->body($response->body());
    }
} 

