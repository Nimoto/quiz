<?php

namespace quiz\assets;

use quiz\core\Asset;

class AssetBundle extends Asset
{
    public static $css = [
        "assets/css/bootstrap.css",
        "assets/css/style.css"
    ];
    public static $js = [
        "assets/js/jquery.min.js",
        "assets/js/script.js"
    ];
}