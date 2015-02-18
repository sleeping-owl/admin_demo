<?php

$database = null;
$host = null;
$port = null;
$username = null;
$password = null;

if (isset($_ENV['CRED_FILE']))
{
	$creds_string = file_get_contents($_ENV['CRED_FILE'], false);
	if ($creds_string == false)
	{
		die('FATAL: Could not read credentials file');
	}
	$creds = json_decode($creds_string, true);
	$database = $creds['MYSQLS']['MYSQLS_DATABASE'];
	$host = $creds['MYSQLS']['MYSQLS_HOSTNAME'];
	$port = $creds['MYSQLS']['MYSQLS_PORT'];
	$username = $creds['MYSQLS']['MYSQLS_USERNAME'];
	$password = $creds['MYSQLS']['MYSQLS_PASSWORD'];
}

return [

	/*
	|--------------------------------------------------------------------------
	| PDO Fetch Style
	|--------------------------------------------------------------------------
	|
	| By default, database results will be returned as instances of the PHP
	| stdClass object; however, you may desire to retrieve records in an
	| array format for simplicity. Here you can tweak the fetch style.
	|
	*/

	'fetch' => PDO::FETCH_CLASS,

	/*
	|--------------------------------------------------------------------------
	| Default Database Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the database connections below you wish
	| to use as your default connection for all database work. Of course
	| you may use many connections at once using the Database library.
	|
	*/

	'default' => 'mysql',

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => [

		'sqlite' => [
			'driver'   => 'sqlite',
			'database' => __DIR__.'/../database/production.sqlite',
			'prefix'   => '',
		],

		'mysql' => [
			'driver'    => 'mysql',
			'host'      => ! is_null($host) ? $host : getenv('DB_HOST'),
			'port'      => ! is_null($port) ? $port : getenv('DB_PORT'),
			'database'  => ! is_null($database) ? $database : getenv('DB_NAME'),
			'username'  => ! is_null($username) ? $username : getenv('DB_USERNAME'),
			'password'  => ! is_null($password) ? $password : getenv('DB_PASSWORD'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		],

		'pgsql' => [
			'driver'   => 'pgsql',
			'host'     => 'localhost',
			'database' => 'forge',
			'username' => 'forge',
			'password' => '',
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		],

		'sqlsrv' => [
			'driver'   => 'sqlsrv',
			'host'     => 'localhost',
			'database' => 'database',
			'username' => 'root',
			'password' => '',
			'prefix'   => '',
		],

	],

	/*
	|--------------------------------------------------------------------------
	| Migration Repository Table
	|--------------------------------------------------------------------------
	|
	| This table keeps track of all the migrations that have already run for
	| your application. Using this information, we can determine which of
	| the migrations on disk haven't actually been run in the database.
	|
	*/

	'migrations' => 'migrations',

	/*
	|--------------------------------------------------------------------------
	| Redis Databases
	|--------------------------------------------------------------------------
	|
	| Redis is an open source, fast, and advanced key-value store that also
	| provides a richer set of commands than a typical key-value systems
	| such as APC or Memcached. Laravel makes it easy to dig right in.
	|
	*/

	'redis' => [

		'cluster' => false,

		'default' => [
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		],

	],

];
