<?php 
class Router {

    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
    protected $route;
    protected $method_prefix;
    protected $language;

// Создаем геттеры

    public function getUri(){
        return $this->uri;
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function getParams(){
        return $this->params;
    }

      public function getRoute() {
        return $this->route;
    }

    public function getMethodPrefix() {
        return $this->method_prefix;
    }

    public function getLanguage() {
        return $this->language;
    }
// Конструктор класса

    public function __construct($uri){
       // print_r('OK. Router was called with uri: ' . $uri);
        $this->uri = urldecode(trim($uri, '/'));
        // Пропишем роуты
        $routes = Config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->language = Config::get('default_language');
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');

        // Преобразуем uri
        $uri_parts = explode('?', $this->uri);

        // Получаем путь
        $path = $uri_parts[0];
        $path_parts = explode('/', $path); // Массив.

        // Костыль. Если проект развернут не в корне сайта, то удаляем 0 элемент массива.
        // Если проект развернут в корне, то не делаем unset
        unset($path_parts[0]);

//        echo "<pre>";
//            print_r($path_parts);
//        echo "</pre>";

        if (count($path_parts)) {
            // Язык или Роут как первый элемент
            if ( in_array(strtolower(current($path_parts)), array_keys($routes))) {
                $this->route = strtolower(current($path_parts));
                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($path_parts);
            } elseif ( in_array(strtolower(current($path_parts)), Config::get('languages'))) {
                $this->language = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            // Получить Контроллер
            if (current($path_parts)) {
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            // Получить Экшн
            if (current($path_parts)) {
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Получить параметры
            $this->params = $path_parts;
        }

    }
}