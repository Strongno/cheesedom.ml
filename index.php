<?php
	//Отображение всех ошибок которые появляются
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  session_start();
  //unset($_SESSION['products']);
  //Определяем ROOT как местоположение файла Index.php
	define('ROOT', dirname(__FILE__));
	//print_r(ROOT);
 	include_once ('components/Autoload.php');
 	$router = new Router();
 	$router->run();
?>