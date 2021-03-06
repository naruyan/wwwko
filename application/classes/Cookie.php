<?php defined('SYSPATH') OR die('No direct script access.');

class Cookie extends Kohana_Cookie
{

	/**
	 * Gets the value of a signed cookie. Cookies without signatures will only
     * be returned if they are marked as priviledged. 
     * If the cookie signature is present, but invalid, the cookie will be deleted.
	 *
	 *     // Get the "theme" cookie, or use "blue" if the cookie does not exist
	 *     $theme = Cookie::get('theme', 'blue');
	 *
	 * @param   string  $key        cookie name
	 * @param   mixed   $default    default value to return
	 * @return  string
	 */
	public static function get($key, $default = NULL)
	{
        $priviledged = Kohana::$config->load('cookie');

        if (!in_array($key, $priviledged['priviledged_cookies']))
        {
            return parent::get($key, $default);
        }

		if ( ! isset($_COOKIE[$key]))
		{
			// The cookie does not exist
			return $default;
        }

        return $_COOKIE[$key];        
    }

	/**
	 * Sets a signed cookie. Note that all cookie values must be strings and no
     * automatic serialization will be performed!
     * If the cookie is marked as privileded it will be set unsigned.
	 *
	 *     // Set the "theme" cookie
	 *     Cookie::set('theme', 'red');
	 *
	 * @param   string  $name       name of cookie
	 * @param   string  $value      value of cookie
	 * @param   integer $expiration lifetime in seconds
	 * @return  boolean
	 * @uses    Cookie::salt
	 */
	public static function set($name, $value, $expiration = NULL)
	{
        $priviledged = Kohana::$config->load('cookie');

        if (!in_array($name, $priviledged['priviledged_cookies']))
        {
            return parent::set($name, $value, $expiration);
        }

		if ($expiration === NULL)
		{
			// Use the default expiration
			$expiration = Cookie::$expiration;
		}

		if ($expiration !== 0)
		{
			// The expiration is expected to be a UNIX timestamp
			$expiration += time();
        }

		return setcookie($name, $value, $expiration, Cookie::$path, Cookie::$domain, Cookie::$secure, Cookie::$httponly);
    }

}

