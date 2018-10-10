<?php
use quiz\core\Application;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$config = file_exists($_SERVER['DOCUMENT_ROOT'] . '/config/config.php')
    ? require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php' : [];

Application::run($config);