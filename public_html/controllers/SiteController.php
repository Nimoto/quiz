<?php

namespace quiz\controllers;

use quiz\core\Controller;
use quiz\models\Quiz;

class SiteController extends Controller
{
    public function index() {
        $this->render('index.php');
    }

    /**
     * @var integer $userIQ
     * @var integer $minDiff
     * @var integer $maxDiff
     * */
    public function emulate() {
        extract($_GET);
        $quiz = new Quiz($userIQ, $minDiff, $maxDiff);
        $quiz->emulate();
        $this->render('result.php', [
            'questions' => $quiz->getQuestions()
        ]);
    }
}