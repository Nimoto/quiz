<?php
/**
 * Конфигурационный файл
 * db - параметры подключения к базе
 * router - параметры роутинга, в частности
 * controller - класс контроллера, обрабатывающего запросы
 * view => path - путь к файлам-шаблонам
 */
return [
    'db' => [
        'host' => 'localhost',
        'dbname' => 'quiz',
        'user' => 'root',
        'pass' => 'root'
    ],
    'router' => [
        'controller' => 'quiz\controllers\SiteController',
    ],
    'view' => [
        'path' => $_SERVER['DOCUMENT_ROOT'] . '/views/'
    ]
];