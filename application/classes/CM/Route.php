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
        if ($session->get('redirect_controller') && $session->get($param_name))
        {
            return Route::url($session->get_once('redirect_controller'), $session->get_once($param_name));
        }
        else
        {
            return Route::url($default_controller, $default_action);
        }
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
        if ($session->get('previous_controller') && $session->get('previous_param'))
        {
            return Route::url($session->get_once('previous_controller'), $session->get_once('previous_param'));
        }
        else
        {
            return Route::url($default_controller, $default_action);
        }
    }
}
