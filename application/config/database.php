<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'MySQL',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 * array    variables    system variables as "key => value" pairs
			 *
             * Ports and sockets may be appended to the hostname.
             *
			 * The following options are available for PDO:
			 *
			 * string   dsn         Data Source Name
			 * string   username    database username
			 * string   password    database password
			 * boolean  persistent  use persistent connections?
			 */
			'hostname'   => 'localhost',
			'database'   => 'ctrl-a',
			'username'   => 'ctrl-a',
			'password'   => 'ctrl-a',
			'persistent' => FALSE,
		),
		'table_prefix' => 'cm_',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
	'forum' => array(
		'type'       => 'mysql',
		'connection' => array(
			'hostname'   => 'localhost',
			'database'   => 'ctrl-a',
			'username'   => 'ctrl-a',
			'password'   => 'ctrl-a',
			'persistent' => FALSE,
		),
		/**
		 * The following extra options are available for PDO:
		 *
		 * string   identifier  set the escaping identifier
		 */
		'table_prefix' => 'forum_',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
);
