<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-09-06 15:45:24 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH\classes\Kohana\Cookie.php [ 151 ] in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Cookie.php:67
2013-09-06 15:45:24 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('PHPSESSID', NULL)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(151): Kohana_Cookie::get('PHPSESSID')
#2 E:\Files\Projects\CTRL-A\CM\cm\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Cookie.php:67
2013-09-06 15:49:13 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH\classes\Kohana\Cookie.php [ 151 ] in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Cookie.php:67
2013-09-06 15:49:13 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('PHPSESSID', NULL)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(151): Kohana_Cookie::get('PHPSESSID')
#2 E:\Files\Projects\CTRL-A\CM\cm\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Cookie.php:67
2013-09-06 15:49:36 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Model\ForumUser.php [ 97 ] in file:line
2013-09-06 15:49:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 15:49:53 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::cookies() ~ APPPATH\classes\Model\ForumUser.php [ 48 ] in file:line
2013-09-06 15:49:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 15:50:53 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH\config\debug.php [ 17 ] in file:line
2013-09-06 15:50:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 15:51:11 --- CRITICAL: ErrorException [ 1 ]: Call to private method Model_ForumUser::load_user() from context 'Controller_Global' ~ APPPATH\classes\Controller\Global.php [ 27 ] in file:line
2013-09-06 15:51:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 15:53:56 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function load_user() ~ APPPATH\classes\Model\ForumUser.php [ 122 ] in file:line
2013-09-06 15:53:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 15:54:14 --- CRITICAL: ErrorException [ 2048 ]: Accessing static property Model_ForumUser::$EXEC_GROUPS as non static ~ APPPATH\classes\Model\ForumUser.php [ 103 ] in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Model\ForumUser.php:103
2013-09-06 15:54:14 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Model\ForumUser.php(103): Kohana_Core::error_handler(2048, 'Accessing stati...', 'E:\Files\Projec...', 103, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Model\ForumUser.php(122): Model_ForumUser->load_user('3070', 'YIZI3mSHifWgu9Q...')
#2 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Global.php(28): Model_ForumUser->debug_user('3070', 'YIZI3mSHifWgu9Q...')
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(69): Controller_Global->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#9 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Model\ForumUser.php:103
2013-09-06 16:17:02 --- CRITICAL: ErrorException [ 2048 ]: Accessing static property Model_ForumUser::$EXEC_GROUPS as non static ~ APPPATH\classes\Model\ForumUser.php [ 108 ] in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Model\ForumUser.php:108
2013-09-06 16:17:02 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Model\ForumUser.php(108): Kohana_Core::error_handler(2048, 'Accessing stati...', 'E:\Files\Projec...', 108, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Model\ForumUser.php(127): Model_ForumUser->load_user('3070', 'YIZI3mSHifWgu9Q...')
#2 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Global.php(28): Model_ForumUser->debug_user('3070', 'YIZI3mSHifWgu9Q...')
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(69): Controller_Global->before()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#9 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Model\ForumUser.php:108
2013-09-06 16:17:24 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'EXEC_GROUPS' ~ APPPATH\classes\Model\ForumUser.php [ 108 ] in file:line
2013-09-06 16:17:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 21:16:34 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'public' (T_PUBLIC), expecting ',' or ';' ~ APPPATH\classes\Controller\Global.php [ 25 ] in file:line
2013-09-06 21:16:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 21:16:52 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Forum_User' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2013-09-06 21:16:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 21:18:10 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Forum_User' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2013-09-06 21:18:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 21:18:13 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Forum_User' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2013-09-06 21:18:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 21:19:35 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Forum_User' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2013-09-06 21:19:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 21:19:46 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function load_settings() ~ APPPATH\classes\Controller\Global.php [ 38 ] in file:line
2013-09-06 21:19:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-06 21:19:57 --- CRITICAL: Database_Exception [ 1146 ]: Table 'ctrl-a.settings' doesn't exist [ SHOW FULL COLUMNS FROM `settings` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\Files\Projects\CTRL-A\CM\cm\modules\database\classes\Kohana\Database\MySQL.php:359
2013-09-06 21:19:57 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\modules\database\classes\Kohana\Database\MySQL.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQL->list_columns('settings')
#2 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Global.php(46): Kohana_ORM::factory('Setting')
#7 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Global.php(38): Controller_Global->load_settings()
#8 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(69): Controller_Global->before()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#11 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#14 {main} in E:\Files\Projects\CTRL-A\CM\cm\modules\database\classes\Kohana\Database\MySQL.php:359
2013-09-06 21:29:49 --- CRITICAL: Database_Exception [ 1146 ]: Table 'ctrl-a.cmsettings' doesn't exist [ SHOW FULL COLUMNS FROM `cmsettings` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in E:\Files\Projects\CTRL-A\CM\cm\modules\database\classes\Kohana\Database\MySQL.php:359
2013-09-06 21:29:49 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\modules\database\classes\Kohana\Database\MySQL.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQL->list_columns('settings')
#2 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 E:\Files\Projects\CTRL-A\CM\cm\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Global.php(46): Kohana_ORM::factory('Setting')
#7 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Global.php(38): Controller_Global->load_settings()
#8 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(69): Controller_Global->before()
#9 [internal function]: Kohana_Controller->execute()
#10 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#11 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#14 {main} in E:\Files\Projects\CTRL-A\CM\cm\modules\database\classes\Kohana\Database\MySQL.php:359
2013-09-06 21:31:02 --- CRITICAL: ErrorException [ 8 ]: Undefined index: term ~ APPPATH\classes\Controller\Welcome.php [ 7 ] in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Welcome.php:7
2013-09-06 21:31:02 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Welcome.php(7): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\Files\Projec...', 7, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#7 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Welcome.php:7
2013-09-06 21:31:24 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\classes\Controller\Welcome.php [ 7 ] in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Welcome.php:7
2013-09-06 21:31:24 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Welcome.php(7): Kohana_Core::error_handler(8, 'Array to string...', 'E:\Files\Projec...', 7, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#7 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Welcome.php:7