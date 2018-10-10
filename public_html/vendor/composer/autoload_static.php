<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca8ce260a125946b44adf33a80f0905e
{
    public static $classMap = array (
        'quiz\\assets\\AssetBundle' => __DIR__ . '/../..' . '/assets/AssetBundle.php',
        'quiz\\controllers\\SiteController' => __DIR__ . '/../..' . '/controllers/SiteController.php',
        'quiz\\core\\Application' => __DIR__ . '/../..' . '/core/Application.php',
        'quiz\\core\\Asset' => __DIR__ . '/../..' . '/core/Asset.php',
        'quiz\\core\\Controller' => __DIR__ . '/../..' . '/core/Controller.php',
        'quiz\\core\\DataBaseConnection' => __DIR__ . '/../..' . '/core/DataBaseConnection.php',
        'quiz\\core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'quiz\\core\\Validator' => __DIR__ . '/../..' . '/core/Validator.php',
        'quiz\\core\\View' => __DIR__ . '/../..' . '/core/View.php',
        'quiz\\models\\DataBaseQuestion' => __DIR__ . '/../..' . '/models/DataBaseQuestion.php',
        'quiz\\models\\DataBaseQuiz' => __DIR__ . '/../..' . '/models/DataBaseQuiz.php',
        'quiz\\models\\Question' => __DIR__ . '/../..' . '/models/Question.php',
        'quiz\\models\\Quiz' => __DIR__ . '/../..' . '/models/Quiz.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitca8ce260a125946b44adf33a80f0905e::$classMap;

        }, null, ClassLoader::class);
    }
}
