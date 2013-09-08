<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Members list controller class. Handles Member listing, signups and administration
 *
 * @package     wwwko
 * @category    Controller
 * @author      Jonathan Lai
 * @TODO        Add flashing of form data back
 */
class Controller_Members extends Controller_Global 
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

	public function action_list()
    {
        $members = ORM::factory('Member');

        $list = $members->where('term', '=', $this->term_num)->find_all();
        $a_signup_url = Route::url("members", array(
            'action' => 'signup',
            'term' => $this->term,
        ));

        $a_change_terms_url = Route::url("members", array('action' => 'change_terms'));

        $member_list = array();
        foreach ($list as $member)
        {
            $member_arr = $member->as_array();
            $member_arr["status"] = $member->status_text->status;
            $member_arr["edit_url"] = Route::url("members", array(
                'action' => 'edit',
                'term' => $this->term,
                'id' => $member->id,
            ));
            $member_arr["activate_url"] = Route::url("members", array(
                'action' => 'activate',
                'term' => $this->term,
                'id' => $member->id,
            ));
            $member_list[] = $member_arr;
        }

        $view = View::factory('members_list')
            ->bind('term', $this->term)
            ->bind('member_list', $member_list)
            ->bind('signup_url', $a_signup_url)
            ->bind('change_terms_url', $a_change_terms_url)
            ->set('is_exec', $this->user->is_exec());

        $this->response->body($view);
    }

    public function action_change_terms()
    {
        $u_term = $this->request->post('term');
        $a_term = urlencode($u_term);
        
        $this->redirect(Route::get("members")->uri(array(
            'action' => 'list',
            'term' => $a_term,
        )));
    }

    public function action_activate()
    {
        $u_id = $this->request->param('id');
        $member = ORM::factory('Member', $u_id);

        if ($this->user->is_exec() && $member->loaded())
        {
            $member->active = 1;
            try
            {
                $member->save();
            }
            catch (ORM_Validation_Exception $e)
            {
                $o_errors = $e->errors('orm');
            }
        }

        $this->redirect(Route::get("members")->uri(array(
            'action' => 'list',
            'term' => $this->term,
        )));
    }

    public function action_signup()
    {
        $this->session->set('redirect_controller', 'members');
        $this->session->set('redirect_param', array('action' => 'list'));
        $this->session->set('redirect_param_repeat', array('action' => 'signup'));
        $a_target = Route::url("members", array(
            'action' => 'signup_sub',
            'term' => $this->term,
        ));
        $a_back = Route::url($this->session->get('redirect_controller'), 
                $this->session->get('redirect_param'));

        $view = View::factory('members_signup')
            ->bind('term', $this->term)
            ->bind('target', $a_target)
            ->bind('back', $a_back);

        $this->response->body($view);
    }

    public function action_signup_sub()
    {
        // Process the redirect
        if (!$this->request->post('repeat'))
        {
            $a_redirect = Route::url($this->session->get_once('redirect_controller'), 
                $this->session->get('redirect_param'));
        }
        else
        {
            $a_redirect = Route::url($this->session->get_once('redirect_controller'), 
                $this->session->get('redirect_param_repeat'));
        }

        if ($this->settings['term'] != $this->term_num && $this->user->is_exec())
        {
            $term = $this->term_num;
        }
        else
        {
            $term = $this->settings['term'];
        }

        $u_name = $this->request->post('name');
        $u_number = $this->request->post('number');
        $u_email = $this->request->post('email');
        $active = intval($this->user->is_exec());

        $member = ORM::factory('Member');

        $member->term = $term;
        $member->number = $u_number;
        $member->name = $u_name;
        $member->email = $u_email;
        $member->active = $active;

        try
        {
            $member->save();
            $o_notice = Kohana::message('members', 'signup_success');
        }
        catch (ORM_Validation_Exception $e)
        {
            $o_errors = $e->errors('orm');
            $o_notice = "<ul><li>" . implode("</li><li>", $o_errors) . "</li></ul>";
        }

        $view = View::factory('redirect')
            ->bind('redirect', $a_redirect)
            ->bind('notice', $o_notice);

        $this->response->body($view);
    }

    public function action_edit()
    {
        $u_id = $this->request->param('id');
        $member = ORM::factory('Member', $u_id);

        if (!$this->user->is_exec() || !$member->loaded())
        {
            $a_redirect = Route::url('members', array(
            'action' => 'list',
            'term' => $this->term,
            ));
            $o_notice = Kohana::message('members', 'edit_fail');

            $view = View::factory('redirect')
                ->bind('redirect', $a_redirect)
                ->bind('notice', $o_notice);

            $this->response->body($view);
            return;
        }

        $o_term = $member->term;
        $o_number = $member->number;
        $o_name = $member->name;
        $o_email = $member->email;
        $o_active = $member->active;
        $o_status = $member->status;
        // TODO Forum Account Integration
        // $o_forum_uid = $member->forum_uid;

        $member_statuses = ORM::factory('MemberStatus');
        $records = $member_statuses->find_all();
        $o_statuses = array();
        foreach($records as $record)
        {
            $o_statuses[intval($record->id)] = $record->status;
        }

        $a_target = Route::url("members", array(
            'action' => 'edit_sub',
            'term' => $o_term,
            'id' => $u_id,
        ));

        $a_delete = Route::url("members", array(
            'action' => 'delete',
            'term' => $o_term,
            'id' => $u_id,
        ));

        $this->session->set('redirect_controller', 'members');
        $this->session->set('redirect_param', array('action' => 'list'));
        $a_back = Route::url($this->session->get('redirect_controller'), 
            $this->session->get('redirect_param'));

        $view = View::factory('members_edit')
            ->bind('term', $o_term)
            ->bind('number', $o_number)
            ->bind('name', $o_name)
            ->bind('email', $o_email)
            ->bind('active', $o_active)
            ->bind('status', $o_status)
            ->bind('statuses', $o_statuses)
            ->bind('target', $a_target)
            ->bind('delete', $a_delete)
            ->bind('back', $a_back);

        $this->response->body($view);
    }

    public function action_edit_sub()
    {
        // Process the redirect
        $a_redirect = Route::url($this->session->get('redirect_controller'), 
            $this->session->get('redirect_param'));

        $u_id = $this->request->param('id');
        $member = ORM::factory('Member', $u_id);

        if (!$this->user->is_exec() || !$member->loaded())
        {
            $o_notice = Kohana::message('members', 'edit_fail');
        }
        else
        {
            $u_term = $this->request->post('term');
            $u_name = $this->request->post('name');
            $u_number = $this->request->post('number');
            $u_email = $this->request->post('email');
            $u_active = $this->request->post('active');
            $u_status = $this->request->post('status');

            $member->term = $u_term;
            $member->number = $u_number;
            $member->name = $u_name;
            $member->email = $u_email;
            $member->active = $u_active;
            $member->status = $u_status;

            try
            {
                $member->save();
                $o_notice = Kohana::message('members', 'edit_success');
            }
            catch (ORM_Validation_Exception $e)
            {
                $o_errors = $e->errors('orm');
                $o_notice = "<ul><li>" . implode("</li><li>", $o_errors) . "</li></ul>";
            }
        }

        $view = View::factory('redirect')
            ->bind('redirect', $a_redirect)
            ->bind('notice', $o_notice);

        $this->response->body($view);
    }

    public function action_delete()
    {
        // Process the redirect
        $a_redirect = Route::url($this->session->get('redirect_controller'), 
            $this->session->get('redirect_param'));

        $u_id = $this->request->param('id');
        $member = ORM::factory('Member', $u_id);

        if (!$this->user->is_exec() || !$member->loaded())
        {
            $o_notice = Kohana::message('members', 'edit_fail');
        }
        else
        {
            try
            {
                $member->delete();
                $o_notice = Kohana::message('members', 'delete_success');
            }
            catch (ORM_Validation_Exception $e)
            {
                $o_errors = $e->errors('orm');
                $o_notice = "<ul><li>" . implode("</li><li>", $o_errors) . "</li></ul>";
            }
        }

        $view = View::factory('redirect')
            ->bind('redirect', $a_redirect)
            ->bind('notice', $o_notice);

        $this->response->body($view);
    }
} 
