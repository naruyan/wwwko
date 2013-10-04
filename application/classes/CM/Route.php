<?php defined('SYSPATH') or die('No direct script access.');

/**
 * URI and Routing helper class. Provides useful utility functions for routing and URIs 
 *
 * @package     wwwko
 * @category    Helper
 * @author      Jonathan Lai
 */

class CM_Route
{
    private function __construct()
    {
    }

    /**
     * Sanitizes and concatenates a redirect URI
     *
     * @param $u_controller     The controller to redirect too
     * @param $u_action         The action to redirect too
     * @param $u_params         The other related parameters for the route, optional
     * @return  string          The URI to redirect too
     */
    public static function clean_redirect_uri($u_controller, $u_action, $u_params = array())
    {
        $controller = urlencode($u_controller);
        $action = urlencode($u_action);
        $params = array();
        foreach($u_params as $key => $value)
        {
            $params[urlencode($key)] = urlencode($value);
        }
        $params['action'] = $action;

        return Route::get($controller)->uri($params);
    }

    /**
     * Builds a routing for a redirect
     *
     * @param $session              The session object for the current controller
     * @param $default_controller   The default controller if no back information is found, default Home Page
     * @param $default_action       The default action if no back information is found, default Home Page
     * @param $param_name           Name of param for redirect, default redirect_param
     * @return url                  The URL for the redirect link
     */
    public static function build_redirect($session, $default_controller="welcome", $default_action=array(), $param_name='redirect_param')
    {
        return self::build_url($session, $default_controller, $default_action, 'redirect_controller', $param_name);
    }

    /**
     * Builds a routing for a back button
     *
     * @param $session              The session object for the current controller
     * @param $default_controller   The default controller if no back information is found, default Home Page
     * @param $default_action       The default action if no back information is found, default Home Page
     * @return url                  The URL for the back link
     */
    public static function build_back($session, $default_controller="welcome", $default_action=array())
    {
        return self::build_url($session, $default_controller, $default_action, 'previous_controller', 'previous_param');
    }

    /**
     * Builds a routing for a url
     *
     * @param $session              The session object for the current controller
     * @param $default_controller   The default controller if no back information is found
     * @param $default_action       The default action if no back information is found
     * @param $controller_name           Name of param for controller
     * @param $param_name           Name of param for redirect
     * @return url                  The URL for the back link
     */
    public static function build_url($session, $default_controller, $default_action, $controller_name, $param_name)
    {
        if ($session->get($controller_name) && $session->get($param_name))
        {
            return Route::url($session->get_once($controller_name), $session->get_once($param_name));
        }
        else
        {
            if (isset($default_controller, $default_action))
            {
                return Route::url($default_controller, $default_action);
            }
            return URL::base();
        }
    }

    /**
     * Create a redirect request
     *
     * @param $controller           A pointer to the calling controller. Must be a controller template.
     * @param $redirect_controller  The controller to redirect too
     * @param $redirect_param       The parameters for the redirect
     * @param $message              The redirect message
     * @param $message_type         The message type, success,info,warning,danger
     * @param $delay                The delay time for redirect
     */
    public static function redirect(Controller_Template $controller, $redirect_controller, $redirect_param, $message, $message_type, $delay)
    {
        $a_redirect = Route::url($redirect_controller, $redirect_param);

        $response = Request::factory(Route::get("redirect")->uri(array(
            'delay'     => $delay,
        )))
            ->post('redirect', $a_redirect)
            ->post('notice', $message)
            ->post('notice_type', $message_type)
            ->execute();

        $controller->auto_render = FALSE;
        $controller->response->body($response->body);
    }
}
