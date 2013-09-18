<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Redirect controller class. Handles redirects, should be internal use only
 *
 * @package     wwwko
 * @category    Controller
 * @author      Jonathan Lai
 */
class Controller_Redirect extends Controller_Global 
{
    public function action_redirect()
    {
        $o_delay = intval($this->request->param('delay', 0));
        $a_redirect = $this->request->post('redirect');
        $o_notice = $this->request->post('notice');
        $o_notice_type = htmlentities($this->request->post('notice_type'));

        if ($this->request->is_initial())
        {
            $a_redirect = Route::get("default")->uri();
            $o_notice = Kohana::message('security', 'insufficient_permissions');
            $o_notice_type = 'danger';
        }

        $this->template->meta_content = View::factory('redirect_meta')
            ->bind('redirect', $a_redirect)
            ->bind('delay', $o_delay);
        $this->template->body_content =  View::factory('redirect')
            ->bind('redirect', $a_redirect)
            ->bind('delay', $o_delay)
            ->bind('notice', $o_notice)
            ->bind('notice_type', $o_notice_type);
    }
}
