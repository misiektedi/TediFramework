<?php

namespace molkuski\TediFramework;

class TediView
{
    public static function Show($view)
    {
        $viewPath = 'tedi-views/' . $view . '.html';
        if (file_exists($viewPath)) {
            echo include($viewPath);
        } else {
            include(__DIR__ . '/views/error.html');
        }
    }

    public static function Print($data, $key)
    {
        echo $data[$key];
    }
}
