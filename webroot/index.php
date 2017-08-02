<?php 
    // Определяем основные константы
define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', dirname(dirname(__FILE__)));

$uri = $_SERVER['REQUEST_URI'];
   
echo 'Главня страница' . '<br>';
print_r($uri);
//


?>