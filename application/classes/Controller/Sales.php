<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Sales controller class. Handles sales tracking
 *
 * @package     wwwko
 * @category    Controller
 * @author      Jonathan Lai
 */
class Controller_Sales extends Controller_Global
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
        
        $this->template_opts['sales_active'] = true;
    }

    public function action_list()
    {
        $sales = ORM::factory('Sale');

        $list = $sales->find_all();

        $a_add_url = Route::url('sales', array(
            'action' => 'add',
        ));

        $sales_list = array();
        foreach ($list as $sale)
        {
            $sale_arr = $sale->as_array();
            $sale_arr['date'] = Date::formatted_time($sale_arr['date'], 'h:i A - M jS Y');
            $sale_arr['detail_url'] = Route::url('sales', array(
                'action' => 'detail',
                'id' => $sale->id,
            ));
            $sales_list[] = $sale_arr;
        }

        $o_title = Kohana::message('global', 'club_name') . ' ' . 
            Kohana::message('sales', 'list_title');

        $this->template->page_title = $o_title;
        $this->template->body_content = View::factory('sales_list')
            ->bind('title', $o_title)
            ->bind('sales_list', $sales_list);

        $this->template->footer_content = View::factory('sales_list_footer')
            ->bind('add_url', $a_add_url);

        $this->session->set('previous_controller', 'sales');
        $this->session->set('previous_param', array('action' => 'list'));
    }

    public function action_detail()
    {
        $u_id = $this->request->param('id');
        $sale = ORM::factory('Sale', $u_id);

        $o_items = array();

        $a_delete = '';

        if ($sale->loaded())
        {
            $o_price = $sale->total_price;
            $o_date = Date::formatted_time($sale->date, 'h:i A - M jS Y');;

            $items = $sale->sale_items->find_all();
            foreach($items as $item)
            {
                $item_arr = $item->as_array();

                $item_obj = ORM::factory('Item', $item->item);
                $item_arr['name'] = '';
                if ($item_obj->loaded())
                {
                    $item_arr['name'] = $item_obj->inventory->name;
                }

                $o_items[] = $item_arr;
            }

            $a_delete = Route::url('sales', array(
                    'action' => 'delete',
                    'id' => $sale->id,
                ));
        }

        $a_back = CM_Route::build_back($this->session, 
            $this->session->get('redirect_controller'), $this->session->get('redirect_param'));

        $o_title = Kohana::message('global', 'club_name') . ' ' . 
            Kohana::message('sales', 'detail_title');
        $this->template->page_title = $o_title;

        $this->template->body_content = View::factory('sales_detail')
            ->bind('price', $o_price)
            ->bind('date', $o_date)
            ->bind('items', $o_items)
            ->bind('title', $o_title)
            ->bind('delete', $a_delete)
            ->bind('back', $a_back);
    }

    public function action_add()
    {
        $a_target = Route::url('sales', array(
            'action' => 'add_sub',
        ));

        $this->session->set('redirect_controller', 'sales');
        $this->session->set('redirect_param', array('action' => 'list'));
        $this->session->set('redirect_param_repeat', array(
            'action' => 'add',
        ));

        $items = ORM::factory('Item')->find_all();
        $item_list = array();
        $item_json = array();
        foreach ($items as $item)
        {
            // Can you even do JOIN queries with the ORM or DB Abstraction layer...
            // TODO: If you can, do that since we don't really want to fetch everything
            if ($item->inventory->concessions)
            {
                $item_list[] = array('id' => $item->id, 'name' => $item->inventory->name, 'price' => $item->inventory->prices->price,);
                $item_json[$item->id] = $item->inventory->prices->price;
            }
        }

        $a_back = CM_Route::build_back($this->session, 
            $this->session->get('redirect_controller'), $this->session->get('redirect_param'));

        $o_title = Kohana::message('global', 'club_name') . ' ' . 
            Kohana::message('sales', 'add_title');
        $this->template->page_title = $o_title;

        $this->template->body_content = View::factory('sales_add')
            ->bind('title', $o_title)
            ->bind('items', $item_list)
            ->set('items_json', json_encode($item_json))
            ->bind('target', $a_target)
            ->bind('back', $a_back);
    }

    public function action_add_sub()
    {
        $sale = ORM::factory('Sale');

        $u_items = $this->request->post('items');
        $u_quantities = $this->request->post('quantities');
        
        try
        {
            $sales_items = array();
            $sale_total_price = 0;

            foreach($u_items as $key => $u_item)
            {
                $item = ORM::factory('Item', $u_item);

                $quantity = intval($u_quantities[$key]);

                if ($item->loaded() && $quantity > 0)
                {
                    $total_price = $item->inventory->prices->price * $quantity;
                    $sales_items[] = array('item' => $item->id, 'total_price' => $total_price, 'quantity' => $quantity,);
                    $sale_total_price += $total_price;
                }
            }

            $sale->date = Date::formatted_time('now', NULL, 'America/Toronto');
            $sale->total_price = $sale_total_price;
            $sale->save();

            foreach($sales_items as $sale_item)
            {
                $item = ORM::factory('SalesItem');
                $item->sale = $sale->id;
                $item->item = $sale_item['item'];
                $item->total_price = $sale_item['total_price'];
                $item->quantity = $sale_item['quantity'];
                $item->save();
            }

            $o_notice = Kohana::message('sales', 'add_success');
            $o_notice_type = 'success';
            // Process the redirect
            $a_redirect = CM_Route::build_redirect($this->session, 'sales');
            $this->session->get_once('redirect_param_repeat');
        }
        catch (ORM_Validation_Exception $e)
        {
            $o_errors = $e->errors('orm');
            $o_notice = "<ul><li>" . implode("</li><li>", $o_errors) . "</li></ul>";
            $o_notice_type = 'danger';
            // Process the redirect
            $a_redirect = CM_Route::build_redirect($this->session, 'sales', array(), 'redirect_param_repeat');
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
        $sale = ORM::factory('Sale', $u_id);

        if (!$sale->loaded())
        {
            // Process the redirect
            $a_redirect = CM_Route::build_redirect($this->session, 'sales');
            $this->session->get_once('redirect_param_repeat');
            $o_notice = Kohana::message('sales', 'edit_fail');
        }
        else
        {
            try
            {
                DB::delete('sales_items')->where('sale', '=', $sale->id)->execute();
                $sale->delete();
                $o_notice = Kohana::message('sales', 'delete_success');
                $o_notice_type = 'success';
                // Process the redirect
                $a_redirect = CM_Route::build_redirect($this->session, 'sales');
                $this->session->get_once('redirect_param_repeat');
            }
            catch (ORM_Validation_Exception $e)
            {
                $o_errors = $e->errors('orm');
                $o_notice = "<ul><li>" . implode("</li><li>", $o_errors) . "</li></ul>";
                $o_notice_type = 'danger';

                // Process the redirect
                $a_redirect = CM_Route::build_redirect($this->session, 'sales', array(), 'redirect_param_repeat');
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

