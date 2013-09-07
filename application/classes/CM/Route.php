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
