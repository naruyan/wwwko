<?php defined('SYSPATH') or die('No direct script access.');

use \Michelf\Markdown;

/**
 * Custom pages controller class. Handles custom pages/wiki
 *
 * @package     wwwko
 * @category    Controller
 * @author      Jonathan Lai
 * @TODO        Add flashing of form data back
 */
class Controller_Pages extends Controller_Global 
{
    public function action_view()
    {
        $u_name = $this->request->param('name');

        if (is_null($u_name))
        {
            $pages = ORM::factory('Page');
            if ($this->user->is_exec())
            {
                $list = $pages->find_all();
            }
            else
            {
                $list = $pages->where('read_perm', '=', '0')->find_all();
            }

            $page_list = array();
            foreach($list as $page)
            {
                $page_arr = $page->as_array();
                $page_arr['url'] = Route::url('pages', array('name' => $page->name));
                $page_list[] = $page_arr;
            }

            $view = View::factory('pages_list')
                ->bind('pages', $page_list);

            $this->response->body($view);
        }
        else
        {
            $page = ORM::factory('Page', $u_name);

            if ($page->loaded())
            {
                // TODO Properly handle permissions
                if (($page->read_perm != 0 && !$this->user->is_exec()))
                {
                    $o_notice = Kohana::message('security', 'insufficient_permissions');
                    $a_redirect = Route::url('pages');

                    $view = View::factory('redirect')
                        ->bind('redirect', $a_redirect)
                        ->bind('notice', $o_notice);

                    $this->response->body($view);

                    return;
                }

                $a_edit = Route::url('pages', array(
                    'name' => urlencode($page->name),
                    'action' => 'edit',
                ));

                $o_write_perm = $page->write_perm == 0 || $this->user->is_exec();

                $a_back = Route::url('pages');

                $view = View::factory('pages')
                    ->set('name', htmlentities($page->name))
                    ->set('content', Markdown::defaultTransform($page->content))
                    ->bind('edit_url', $a_edit)
                    ->bind('back_url', $a_back)
                    ->bind('write_permissions', $o_write_perm);

                $this->response->body($view);
            }
            else
            {
                $this->redirect(Route::get('pages')->uri(array(
                    'action'    => 'edit',
                    'name'      => urlencode($u_name),
                )));
            }
        }
    }

    public function action_edit()
    {
        $u_name = $this->request->param('name');

        if (is_null($u_name))
        {
            $o_notice = Kohana::message('pages', 'invalid_name');
            $a_redirect = Route::url('pages');

            $view = View::factory('redirect')
                ->bind('redirect', $a_redirect)
                ->bind('notice', $o_notice);

            $this->response->body($view);
        }
        else
        {
            $page = ORM::factory('Page', $u_name);

            if ($page->loaded())
            {
                if (($page->write_perm != 0 && !$this->user->is_exec()))
                {
                    $o_notice = Kohana::message('security', 'insufficient_permissions');
                    $a_redirect = Route::url('pages');

                    $view = View::factory('redirect')
                        ->bind('redirect', $a_redirect)
                        ->bind('notice', $o_notice);

                    $this->response->body($view);

                    return;
                }

                $o_name = htmlentities($page->name);
                $o_content = htmlentities($page->content);

                //TODO As with the stuff above, temp until permissions are properly worked out
                if ($page->read_perm != 0)
                {
                    $o_perm = 2;
                }
                else if ($page->write_perm != 0)
                {
                    $o_perm = 1;
                }
                else
                {
                    $o_perm = 0;
                }
            }
            else
            {
                $o_name = htmlentities($u_name);
                $o_content = '';
                $o_perm = 0;
            }

            $this->session->set('redirect_controller', 'pages');
            $this->session->set('redirect_param', array('name' => urlencode($u_name)));

            $a_target = Route::url("pages", array(
                'action' => 'edit_sub',
                'name' => urlencode($u_name),
            ));
            $a_back = Route::url("pages", array('name' => urlencode($u_name)));
            $o_perm_text = Kohana::message('pages', 'permissions_text');

            $view = View::factory('pages_edit')
                ->bind('name', $o_name)
                ->bind('content', $o_content)
                ->bind('permissions', $o_perm)
                ->bind('permissions_text', $o_perm_text)
                ->bind('target', $a_target)
                ->bind('back', $a_back)
                ->set('base_url', URL::site());

            $this->response->body($view);
        }
    }

    public function action_edit_sub()
    {
        // Process the redirect
        $a_redirect = Route::url($this->session->get('redirect_controller'), 
            $this->session->get('redirect_param'));

        $u_name = $this->request->param('name');
        $page = ORM::factory('Page', $u_name);

        if (($page->loaded() && $page->write_perm != 0 && !$this->user->is_exec())
            || (!$page->loaded() && !$this->user->is_exec()))
        {
            $o_notice = Kohana::message('security', 'insufficient_permissions');
        }
        else
        {
            $u_content = $this->request->post('content');
            $permissions = intval($this->request->post('permissions'));
            $write_perm = $permissions >= 1;
            $read_perm = $permissions >= 2;

            $page->name = $u_name;
            $page->content = $u_content;
            $page->write_perm = intval($write_perm);
            $page->read_perm = intval($read_perm);

            try
            {
                $page->save();
                $o_notice = Kohana::message('pages', 'edit_success');
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
