<?php

namespace molkuski\TediFramework;

class TediRoute
{
    private static $routes = [];

    public static function get($route, $callback)
    {
        self::$routes['GET'][$route] = $callback;
    }

    public static function Execute()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset(self::$routes[$method][$path])) {
            call_user_func(self::$routes[$method][$path]);
        } else {
            http_response_code(404);

            if (file_exists('tedi-views/errors/404.html')) {
                echo file_get_contents('tedi-views/errors/404.html');
            } else {
                echo "404 Not Found";
            }
        }
    }
}
