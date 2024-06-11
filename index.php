<?php
    session_start();
    spl_autoload_register(function ($class) {
        if (file_exists("app/core/$class.php")) {
            require_once "app/core/$class.php";
        }
    });

    spl_autoload_register(function ($class) {
        if (file_exists("app/controller/$class.php")) {
            require_once "app/controller/$class.php";
        }
    });

    spl_autoload_register(function ($class) {
        if (file_exists("app/model/$class.php")) {
            require_once "app/model/$class.php";
        }
    });

    require_once "app/routes/routes.php";
    $requestedMethod = $_SERVER['REQUEST_METHOD'];
    $requestedURI = $_SERVER['REQUEST_URI'];
    $splitURL = explode("index.php/", $requestedURI);
    $request = !empty($splitURL[1])? $splitURL[1]: '';
    $routeFound = false;

    if ($requestedMethod == 'GET') {
        $getRoutes = Routes::getRoutes('GET');
        foreach ($getRoutes as $route) {
            if (strstr($request, $route['url'])) {
                $routeFound = true;
                $url = $route['url'];
                $controller = $route['controller'];
                $method = $route['method'];
            }
        }
    } elseif ($requestedMethod == 'POST') {
        $postRoutes = Routes::getRoutes('POST');
        foreach ($postRoutes as $route) {
            if (strstr($request, $route['url'])) {
                $routeFound = true;
                $url = $route['url'];
                $controller = $route['controller'];
                $method = $route['method'];
            }
        }
    } else {
        throw new Exception('Invalid Request Method !');
    }
    
    if ($routeFound) {
        $controller = new $controller();
        $parameters = str_replace($url, '', $request);
        $parameters = ltrim($parameters, '/');
        if ($parameters != '/' && $parameters != null) {
            $controller->$method(...explode('/', $parameters));
        } else {
            $controller->$method();
        }
    } else {
        throw new Exception("No Routes Defined !");
    }
