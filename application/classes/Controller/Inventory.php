<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Inventory controller class. Handles inventory listing and editing
 *
 * @package     wwwko
 * @category    Controller
 * @author      Jonathan Lai
 */
class Controller_Inventory extends Controller_Global
{
    public function before()
    {
        parent::before();

        if (!$this->user->is_exec())
        {
            $response = Request::factory(Route::get("redirect")->uri(array(
                'delay'     => 1,
            )))
                ->post('notice_type', 'security')
                ->execute();
        }

        $this->template_opts['inventory_active'] = true;
    }

    public function action_list()
    {
        $items = ORM::factory('Inventory');

        $list = $items->find_all();

        $a_edit_url = Route::url('inventory', array(
            'action' => 'edit',
        ));

        $item_list = array();
        foreach ($list as $item)
        {
            $item_arr = $item->as_array();
            $item_arr['edit_url'] = Route::url('inventory', array(
                'action' => 'edit',
                'id' => $item->id,
            ));
            $item_list[] = $item_arr;
        }

        $o_title = Kohana::message('global', 'club_name') . ' ' . 
            Kohana::message('inventory', 'list_title');

        $this->template->page_title = $o_title;
        $this->template->body_content = View::factory('inventory_list')
            ->bind('title', $o_title)
            ->bind('item_list', $item_list);

        $this->template->footer_content = View::factory('inventory_list_footer')
            ->bind('edit_url', $a_edit_url);

        $this->session->set('previous_controller', 'inventory');
        $this->session->set('previous_param', array('action' => 'list'));
    }

    public function action_detail()
    {
    }

    public function action_edit()
    {
        $u_id = $this->request->param('id');
        $item = ORM::factory('Inventory', $u_id);

        $o_name = '';
        $o_description = '';
        $o_quantity = '';
        $o_concessions = '';
        $o_prizes = '';
        $o_price = '';
        $loaded = false;

        if ($item->loaded())
        {
            $o_name = $item->name;
            $o_description = $item->description;
            $o_quantity = $item->quantity;
            $o_concessions = ($item->concessions) ? 'checked' : '';
            $o_prizes = ($item->prizes) ? 'checked' : '';
            $o_price = $item->prices->price;
            $loaded = true;
        }

        $a_target = Route::url('inventory', array(
            'action' => 'edit_sub',
            'id' => $u_id,
        ));

        $a_delete = Route::url('inventory', array(
            'action' => 'delete',
            'id' => $u_id,
        ));

        $this->session->set('redirect_controller', 'inventory');
        $this->session->set('redirect_param', array('action' => 'list'));
        $this->session->set('redirect_param_repeat', array(
            'action' => 'edit',
            'id' => $u_id,
        ));

        $a_back = CM_Route::build_back($this->session, 
            $this->session->get('redirect_controller'), $this->session->get('redirect_param'));

        $o_title = Kohana::message('global', 'club_name') . ' ' . 
            Kohana::message('inventory', 'edit_title');
        $this->template->page_title = $o_title;

        $this->template->body_content = View::factory('inventory_edit')
            ->bind('title', $o_title)
            ->bind('name', $o_name)
            ->bind('description', $o_description)
            ->bind('quantity', $o_quantity)
            ->bind('concessions', $o_concessions)
            ->bind('prizes', $o_prizes)
            ->bind('price', $o_price)
            ->bind('loaded', $loaded)
            ->bind('target', $a_target)
            ->bind('delete', $a_delete)
            ->bind('back', $a_back);
    }

    public function action_edit_sub()
    {
        $u_id = $this->request->param('id');
        $item = ORM::factory('Inventory', $u_id);

        $u_name = $this->request->post('name');
        $u_description = $this->request->post('description');
        $u_quantity = $this->request->post('quantity');
        $u_concessions = $this->request->post('concessions');
        $u_prizes = $this->request->post('prizes');
        $u_price = $this->request->post('price');

        $item->name = $u_name;
        $item->description = $u_description;
        $item->quantity = $u_quantity;
        $item->concessions = $u_concessions;
        $item->prizes = $u_prizes;
        $price = intval($u_price);
        
        try
        {
            if ($item->loaded())
            {
                if ($price > 0 && $item->prices->loaded())
                {
                    $item->prices->price = $price;

                    $item->prices->save();
                }
                else if ($price > 0)
                {
                    $prices = ORM::factory('Price');
                    $prices->inventory_id = $item->id;
                    $prices->price = $price;

                    $prices->save();
                }
                $item->save();
                $o_notice = Kohana::message('inventory', 'edit_success');
                $o_notice_type = 'success';

                // Process the redirect
                $a_redirect = CM_Route::build_redirect($this->session, 'inventory');
                $this->session->get_once('redirect_param_repeat');
            }
            else
            {
                $item->save();
                
                if ($price > 0)
                {
                    $prices = ORM::factory('Price');
                    $prices->inventory_id = $item->id;
                    $prices->price = $price;

                    $prices->save();
                }

                $idv_item = ORM::factory('Item');
                $idv_item->inventory_id = $item->id;
                $idv_item->description = $item->name;
                $idv_item->quantity = $item->quantity;

                $idv_item->save();

                $o_notice = Kohana::message('inventory', 'edit_success');
                $o_notice_type = 'success';
                // Process the redirect
                $a_redirect = CM_Route::build_redirect($this->session, 'inventory');
                $this->session->get_once('redirect_param_repeat');
            }
        }
        catch (ORM_Validation_Exception $e)
        {
            $o_errors = $e->errors('orm');
            $o_notice = "<ul><li>" . implode("</li><li>", $o_errors) . "</li></ul>";
            $o_notice_type = 'danger';
            // Process the redirect
            $a_redirect = CM_Route::build_redirect($this->session, 'inventory', array(), 'redirect_param_repeat');
            $this->session->get_once('redirect_param');
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

    public function action_delete()
    {
        $u_id = $this->request->param('id');
        $item = ORM::factory('Inventory', $u_id);

        if (!$item->loaded())
        {
            // Process the redirect
            $a_redirect = CM_Route::build_redirect($this->session, 'inventory');
            $this->session->get_once('redirect_param_repeat');
            $o_notice = Kohana::message('inventory', 'edit_fail');
        }
        else
        {
            try
            {
                if ($item->prices->loaded())
                {
                    DB::delete('item_prices')->where('price_id', '=', $item->prices->id)->execute();
                    $item->prices->delete();
                }

                DB::delete('items')->where('inventory_id', '=', $item->id)->execute();
                DB::delete('inventory_alternate_names')->where('inventory_id', '=', $item->id)->execute();
                $item->delete();
                $o_notice = Kohana::message('inventory', 'delete_success');
                $o_notice_type = 'success';
                // Process the redirect
                $a_redirect = CM_Route::build_redirect($this->session, 'inventory');
                $this->session->get_once('redirect_param_repeat');
            }
            catch (ORM_Validation_Exception $e)
            {
                $o_errors = $e->errors('orm');
                $o_notice = "<ul><li>" . implode("</li><li>", $o_errors) . "</li></ul>";
                $o_notice_type = 'danger';

                // Process the redirect
                $a_redirect = CM_Route::build_redirect($this->session, 'inventory', array(), 'redirect_param_repeat');
                $this->session->get_once('redirect_param');
            }
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
