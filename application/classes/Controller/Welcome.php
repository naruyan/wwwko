<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Global {

	public function action_index()
    {
        $a_members_url = Route::url('members');
        $a_pages_url = Route::url('pages');

        $view = View::factory("home")
            ->bind('members_url', $a_members_url)
            ->bind('pages_url', $a_pages_url);

        $this->response->body($view);
	}

} // End Welcome
