<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Global {

	public function action_index()
	{
        $this->response->body(Route::get('members')->uri(array(
            'action' => 'signup',
            'term' => '64',
        'id' => '5',)));
	}

} // End Welcome
