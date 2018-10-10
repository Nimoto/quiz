<?php

namespace quiz\core;

use quiz\core\DataBaseConnection;

class Application
{
    public static $dbConnection = false;

    public static function run($config)
    {
        if (isset($config['db'])) {
            self::$dbConnection = DataBaseConnection::init($config['db']);
        }
        if (isset($config['view'])) {
            View::init($config['view']);
        }
        if (isset($config['router'])) {
            Router::init($config['router']);
            $action = isset($_GET['action']) ? $_GET['action'] : 'index';
            Router::route($action);
        }
    }
}