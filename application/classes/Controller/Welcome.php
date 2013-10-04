<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Global {

	public function action_index()
    {
        $this->template->page_title = "CTRL-A | wwwko Club Manager";
        $this->template->body_content = View::factory("home");
	}

} // End Welcome
