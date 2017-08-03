<?php 
    // Определяем основные константы
define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', dirname(dirname(__FILE__)));
//define ('ROOT', dirname(__FILE__));

$uri = $_SERVER['REQUEST_URI'];
//print_r($uri);

require_once(ROOT . DS . 'lib' . DS . 'init.php');
$router = new Router($uri);



?>