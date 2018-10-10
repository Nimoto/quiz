<?php

namespace quiz\core;


class Asset
{
    public static $css = [];
    public static $js = [];

    public static function printCss()
    {
        foreach (static::$css as $link) {
            echo "<link href='$link'  rel=\"stylesheet\"/>";
        }
    }

    public static function printJs()
    {
        foreach (static::$js as $link) {
            echo "<script src='$link'></script>";
        }
    }
}