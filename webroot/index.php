<?php 
    // Определяем основные константы
define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', dirname(dirname(__FILE__)));

$uri = $_SERVER['REQUEST_URI'];
//print_r($uri);

require_once(ROOT . DS . 'lib' . DS . 'init.php');
$router = new Router($uri);

echo "<pre>";
print_r('Router:' . $router->getRoute() . PHP_EOL);
print_r('Language:' . $router->getLanguage() . PHP_EOL);
print_r('Controller:' . $router->getController() . PHP_EOL);
print_r('Action called:' . $router->getMethodPrefix() . $router->getAction() . PHP_EOL);
echo 'Params: ';
print_r($router->getParams());

