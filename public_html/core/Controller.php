<?php

namespace quiz\core;

abstract class Controller
{
    public function render($viewPath, $params = [])
    {
        View::render($viewPath, $params);
    }

    abstract public function index();
}