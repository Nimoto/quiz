<?php

namespace quiz\core;

class Router
{
    private static $controller;

    public static function init($config)
    {
        if (isset($config['controller'])) {
            self::$controller = new $config['controller']();
            if (get_parent_class(self::$controller) !== 'quiz\core\Controller') {
                trigger_error('Wrong controller class', E_USER_ERROR);
            }
        }
    }

    public static function route($action)
    {
        self::$controller->$action();
    }
}