<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Forum User model class. Provides access to forum user accounts
 *
 * @package     wwwko
 * @category    Model
 * @author      Jonathan Lai
 */
class Model_ForumUser extends Model_Database
{
    /**
     * @var Username
     */
    private $_username;

    /**
     * @var Usergroups
     */
    private $_groups;

    /**
     * @var Is the user an exec
     */
    private $_is_exec;

    /**
     * @var Is the user logged in
     */
    private $_is_logged_in;

    /**
     * @var List of executive user groups
     */
    private static $EXEC_GROUPS = array(3, 4, 8);

    /**
     * Initializes the user session from the forum sessions
     * Checks the Cookies to determine if they are consistent with being logged in
     * Then checks the database the validate their contents
     *
     * @return  void
     */
    public function load()
    {
        // Attempt to get the Session ID
        $u_sid = $_COOKIE['sid'];
        $this->_groups = array();

        if ($u_sid)
        {
            // Attempt to load the session from the database
            $result = DB::select()->from('sessions')->where('sid', '=', $u_sid)->and_where('ip', '=', Request::$client_ip)->limit(1)->execute('forum');
            
            if ($result->count() == 1)
            {
                $u_mybbuser = $_COOKIE['mybbuser'];
                if ($u_mybbuser)
                {
                    $u_logon = explode("_", $u_mybbuser, 2);
                    $current = $result->current();
                    if ($u_logon[0] == $current['uid'])
                    {
                        $valid = $this->load_user(intval($u_logon[0]), Database::instance('forum')->escape($u_logon[1]));
                        if ($valid)
                        {
                            return;
                        }
                    }
                }
            }
        }

        $this->_username = '';
        $this->_is_exec = false;
        $this->_is_logged_in = false;
    }

    /**
     * Load a user from the forum database with their credentials
     *
     * @param   $uid        The user id of the user
     * @param   $password   The loginkey of the user
     * @return  boolean     True if the user was successfully loaded
     */
    private function load_user($uid, $password)
    {
        $uid = intval($uid);
        $result = DB::select()->from('users')->where('uid', '=', $uid)->limit(1)->execute('forum');
        if ($result->count() == 1)
        {
            $user = $result->current();
            if ($password == $user['loginkey'])
            {
                $this->_username = $user['username'];

                if (isset($user['additionalgroups']))
                {
                    $this->_groups = explode(",", $user['additionalgroups']);
                }
                $this->_groups[] = $user['usergroup'];

                $this->_is_exec = false;
                foreach($this->_groups as $gid)
                {
                    if (in_array($gid, self::$EXEC_GROUPS))
                    {
                        $this->_is_exec = true;
                        break;
                    }
                }

                $this->_is_logged_in = true;

                return true;
            }
        }
        return false;
    }

    public function debug_user($uid, $password)
    {
        if (Kohana::$environment == Kohana::DEVELOPMENT)
        {
            return $this->load_user($uid, $password);
        }
        return false;
    }

    /**
     * @return  string  Username
     */
    public function username()
    {
        return $this->_username;
    }

    /**
     * @return array    User Groups
     */
    public function groups()
    {
        return $this->_groups;
    }

    /**
     * @return  boolean Is an Exec
     */
    public function is_exec()
    {
        return $this->_is_exec;
    }

    /**
     * @return  boolean Is Logged In
     */
    public function is_logged_in()
    {
        return $this->_is_logged_in;
    }
}
