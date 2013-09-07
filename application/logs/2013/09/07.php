<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-09-07 02:11:58 --- CRITICAL: ErrorException [ 4096 ]: Object of class Route could not be converted to string ~ SYSPATH\classes\Kohana\Response.php [ 160 ] in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Response.php:160
2013-09-07 02:11:58 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Response.php(160): Kohana_Core::error_handler(4096, 'Object of class...', 'E:\Files\Projec...', 160, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Welcome.php(7): Kohana_Response->body(Object(Route))
#2 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#8 {main} in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Response.php:160
2013-09-07 14:46:26 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\Members.php [ 37 ] in file:line
2013-09-07 14:46:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 14:46:36 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\classes\Controller\Members.php [ 90 ] in file:line
2013-09-07 14:46:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 14:46:56 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\classes\Controller\Members.php [ 114 ] in file:line
2013-09-07 14:46:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 14:47:10 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'else' (T_ELSE), expecting function (T_FUNCTION) ~ APPPATH\classes\Controller\Members.php [ 138 ] in file:line
2013-09-07 14:47:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 14:47:19 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'array' (T_ARRAY), expecting ')' ~ APPPATH\classes\Model\Member.php [ 41 ] in file:line
2013-09-07 14:47:19 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 14:47:43 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'array' (T_ARRAY), expecting ')' ~ APPPATH\classes\Model\Member.php [ 41 ] in file:line
2013-09-07 14:47:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 14:47:45 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'array' (T_ARRAY), expecting ')' ~ APPPATH\classes\Model\Member.php [ 41 ] in file:line
2013-09-07 14:47:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 14:48:16 --- CRITICAL: Kohana_Exception [ 0 ]: The requested route does not exist: Members ~ SYSPATH\classes\Kohana\Route.php [ 109 ] in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php:48
2013-09-07 14:48:16 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(48): Kohana_Route::get('Members')
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_list()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#7 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php:48
2013-09-07 14:49:49 --- CRITICAL: Kohana_Exception [ 0 ]: The requested route does not exist: Members ~ SYSPATH\classes\Kohana\Route.php [ 109 ] in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php:48
2013-09-07 14:49:49 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(48): Kohana_Route::get('Members')
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_list()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#7 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php:48
2013-09-07 15:04:45 --- CRITICAL: ErrorException [ 2 ]: Illegal offset type in isset or empty ~ SYSPATH\classes\Kohana\Route.php [ 107 ] in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php:107
2013-09-07 15:04:45 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php(107): Kohana_Core::error_handler(2, 'Illegal offset ...', 'E:\Files\Projec...', 107, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php(215): Kohana_Route::get(Array)
#2 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(52): Kohana_Route::url(Array)
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#9 {main} in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php:107
2013-09-07 15:11:08 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: signup_uri ~ APPPATH\views\members_list.php [ 24 ] in E:\Files\Projects\CTRL-A\CM\cm\application\views\members_list.php:24
2013-09-07 15:11:08 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\views\members_list.php(24): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\Files\Projec...', 24, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(61): include('E:\Files\Projec...')
#2 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\Files\Projec...', Array)
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(80): Kohana_Response->body(Object(View))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_list()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#9 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#12 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\views\members_list.php:24
2013-09-07 15:11:30 --- CRITICAL: Kohana_Exception [ 0 ]: The requested route does not exist: Members ~ SYSPATH\classes\Kohana\Route.php [ 109 ] in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php:215
2013-09-07 15:11:30 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php(215): Kohana_Route::get('Members')
#1 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(128): Kohana_Route::url('Members', Array)
#2 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_signup()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#8 {main} in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php:215
2013-09-07 15:11:38 --- CRITICAL: Kohana_Exception [ 0 ]: The requested route does not exist: Members ~ SYSPATH\classes\Kohana\Route.php [ 109 ] in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php:215
2013-09-07 15:11:38 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php(215): Kohana_Route::get('Members')
#1 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(128): Kohana_Route::url('Members', Array)
#2 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_signup()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#8 {main} in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php:215
2013-09-07 15:12:49 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$this' (T_VARIABLE) ~ APPPATH\classes\Controller\Members.php [ 135 ] in file:line
2013-09-07 15:12:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 15:34:44 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Member_Status' not found ~ MODPATH\orm\classes\Kohana\ORM.php [ 46 ] in file:line
2013-09-07 15:34:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 15:35:42 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: is_exec ~ APPPATH\views\members_list.php [ 14 ] in E:\Files\Projects\CTRL-A\CM\cm\application\views\members_list.php:14
2013-09-07 15:35:42 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\views\members_list.php(14): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\Files\Projec...', 14, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(61): include('E:\Files\Projec...')
#2 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\Files\Projec...', Array)
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(80): Kohana_Response->body(Object(View))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_list()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#9 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#12 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\views\members_list.php:14
2013-09-07 15:36:21 --- CRITICAL: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH\classes\Controller\Members.php [ 79 ] in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php:79
2013-09-07 15:36:21 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(79): Kohana_Core::error_handler(2048, 'Only variables ...', 'E:\Files\Projec...', 79, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_list()
#2 [internal function]: Kohana_Controller->execute()
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#7 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php:79
2013-09-07 15:37:00 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\Members.php [ 89 ] in file:line
2013-09-07 15:37:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 15:39:56 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Response::redirect() ~ APPPATH\classes\Controller\Members.php [ 113 ] in file:line
2013-09-07 15:39:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-09-07 15:49:00 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\redirect.php [ 8 ] in E:\Files\Projects\CTRL-A\CM\cm\application\views\redirect.php:8
2013-09-07 15:49:00 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\application\views\redirect.php(8): Kohana_Core::error_handler(8, 'Array to string...', 'E:\Files\Projec...', 8, Array)
#1 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(61): include('E:\Files\Projec...')
#2 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(348): Kohana_View::capture('E:\Files\Projec...', Array)
#3 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(302): Kohana_Response->body(Object(View))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_edit_sub()
#7 [internal function]: Kohana_Controller->execute()
#8 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#9 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#12 {main} in E:\Files\Projects\CTRL-A\CM\cm\application\views\redirect.php:8
2013-09-07 15:57:16 --- CRITICAL: Kohana_Exception [ 0 ]: The requested route does not exist:  ~ SYSPATH\classes\Kohana\Route.php [ 109 ] in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php:215
2013-09-07 15:57:16 --- DEBUG: #0 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php(215): Kohana_Route::get(NULL)
#1 E:\Files\Projects\CTRL-A\CM\cm\application\classes\Controller\Members.php(262): Kohana_Route::url(NULL, NULL)
#2 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Controller.php(84): Controller_Members->action_edit_sub()
#3 [internal function]: Kohana_Controller->execute()
#4 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Members))
#5 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 E:\Files\Projects\CTRL-A\CM\cm\index.php(118): Kohana_Request->execute()
#8 {main} in E:\Files\Projects\CTRL-A\CM\cm\system\classes\Kohana\Route.php:215