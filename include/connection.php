<?php
	ob_start();
	if (!isset($_SESSION)) {
		session_start();
	}
	$local_hostname = "localhost";
	$server = $_SERVER['SERVER_NAME'];

	
		$hostname = "localhost";
		$username = "shopercity_user";
		$password = "nCq53z~4";
		$db = "shopercity_db";
	
	// Create connection
	try {
		$conn = new PDO('mysql:host='.$hostname.';dbname='.$db, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo $e->getMessage();
		die();
	}
	
	if(!defined('DIR')){
		define('DIR','https://shopercity.com/');
	}
	if (!defined('URL')) {
		define('URL', 'https://shopercity.com/');
	}
	include_once 'function.php';
	$user = new USER($conn);

	
?>