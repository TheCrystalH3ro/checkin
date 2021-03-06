<?php

require 'vendor/autoload.php';
require 'inc/classes.php';

use Checkin\User;
use Medoo\Medoo;

$base_url = 'http://localhost/job/checkin/checkin/';

$db = [
    'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'password' => '',
    'name' => 'checkin',
];

$database = new Medoo([
	// [required]
	'type' => 'mysql',
	'host' => $db['host'],
	'database' => $db['name'],
	'username' => $db['user'],
	'password' => $db['password'],
 
	// [optional]
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
	'port' => $db['port'],
 
	// [optional]
	// Error mode
	// Error handling strategies when error is occurred.
	// PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
	// Read more from https://www.php.net/manual/en/pdo.error-handling.php.
	'error' => PDO::ERRMODE_SILENT,
 
	// [optional]
	// The driver_option for connection.
	// Read more from http://www.php.net/manual/en/pdo.setattribute.php.
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	],
 
	// [optional] Medoo will execute those commands after connected to the database.
	'command' => [
		'SET SQL_MODE=ANSI_QUOTES'
	]
]);

include 'inc/functions.php';

//ENVIRONMENT

session_start();

if(isset($_SESSION['user']) && $_SESSION['user'] != null) {

	$is_logged = 1;

	$user = GetUserById($database, $_SESSION['user']);

	$sections = GetSections($database);

	$u_section = GetUserSection($database, $user->GetId());

} else {
	$is_logged = 0;
}

