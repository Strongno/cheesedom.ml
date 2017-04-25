<?php

class Router {

    private $routes;

    //Подключаем routes.php
    public function __construct() {
        $routesPath = ROOT . '/components/routes.php';
        $this->routes = include($routesPath);
    }

    //Получаем УРЛ стараници без названия сайта.
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], ' ');
        }
    }

    public function run() {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            //Если routes->uri(news) compromises $uri
            if (preg_match("~$uriPattern~", $uri)) {
                //Ищет в $uri по шаблону $uriPattern и заменяет на $path
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $internalRoute = trim($internalRoute, '/');
                $segmets = explode('/', $internalRoute);

                $controllerName = array_shift($segmets) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segmets));

                $parameters = $segmets;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
    }

}
