<?php

namespace quiz\controllers;

use quiz\core\Controller;
use quiz\models\Quiz;

class SiteController extends Controller
{
    /**
     * Обработка главной страницы
     */
    public function index()
    {
        $this->render('index.php');
    }

    /**
     * Обработка страницы /?action=emulate
     * */
    public function emulate()
    {
        extract($_POST);
        if (isset($userIQ) && isset($minDiff) && isset($maxDiff)) {
            $quiz = new Quiz($userIQ, $minDiff, $maxDiff);
            $quiz->emulate();
            $this->render('result.php', [
                'userIQ' => $quiz->getUserIQ(),
                'rightAnswerCount' => $quiz->getResult(),
                'questions' => $quiz->getQuestions()
            ]);
        }
    }

    /**
     * Обработка страницы /?action=quizlist
     * */
    public function quizlist()
    {
        $this->render('list.php', [
            'quizList' => Quiz::getAll()
        ]);
    }
}