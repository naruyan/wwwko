<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Database helper class. Provides useful utility functions for database 
 * and database value related things
 *
 * @package     wwwko
 * @category    Helper
 * @author      Jonathan Lai
 */

class CM_DB
{
    private function __construct()
    {
    }

    /**
     * Converts term numbers into human readable format
     *
     * @param   $u_num      The term number to convert
     * @param   $default    The value to return on an invalid number, default 'N/A'
     * @return  string      The human readable term name
     */
    public static function num_to_term($u_num, $default = 'N/A')
    {
        $num = intval($u_num);
        if ($num < 1)
        {
            return $default;
        }

        $num = $num - 1;

        $term = $num % 3;
        switch ($term)
        {
            case 0:
            {
                $term = 'F';
                break;
            }
            case 1:
            {
                $term = 'W';
                break;
            }
            case 2:
            {
                $term = 'S';
                break;
            }
        }
        $year = ceil($num / 3.0) + 1992; // Founding Date
        $year = substr(strval($year), -2);

        return $term . $year;
    }

    /**
     * Converts human readable terms into term numbers for database
     * @param   $u_term     The term string to convert
     * @return  integer     The term number or false if conversion is not possible
     * @todo Probably should make this throw instead
     */
    public static function term_to_num($u_term)
    {
        $term = strtolower(strval($u_term));

        switch ($term[0])
        {
            case 'f':
                $mod = 2;
                break;
            case 'w':
                $mod = 0;
                break;
            case 's':
                $mod = 1;
                break;
            default:
                return false;
        }

        $numbers = preg_replace("/[^0-9]/", "", $term);
        if (strlen($numbers) < 2)
        {
            return false;
        }
        $numbers = intval(substr($numbers, -2));
        if ($numbers < 92)
        {
            $numbers = $numbers + 2000;
        }
        else
        {
            $numbers = $numbers + 1900;
        }
        $numbers = (($numbers - 1992) * 3) - 1;

        return ($numbers + $mod);
    }
}
