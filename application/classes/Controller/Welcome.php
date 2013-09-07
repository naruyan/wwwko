<?php defined('SYSPATH') or die('No direct script access.');

use \Michelf\Markdown;

class Controller_Welcome extends Controller_Global {

	public function action_index()
    {
        $o_output = Markdown::defaultTransform(file_get_contents("LICENSE.md"));
        $this->response->body($o_output);
	}

} // End Welcome
