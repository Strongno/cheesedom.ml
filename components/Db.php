<?php 

class Db {
	
	public static function getConnection() {
		$paramsPath = ROOT.'/components/db_params.php';
		$params = include($paramsPath);
		
		$dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);
		$db ->exec ("set names utf-8");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
}