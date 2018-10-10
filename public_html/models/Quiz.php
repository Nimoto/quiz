<?php

namespace quiz\models;

use quiz\core\Validator;
use quiz\models\DataBaseQuiz;

class Quiz
{
    use Validator;

    private $dbEntity;
    private $questionCount = 40;
    private $questions = [];

    /**
     * @var DataBaseQuiz $dbEntity - привязка к DAO модели
     */
    public function __construct($userIQ, $minDifficult, $maxDifficult)
    {
        $this->dbEntity = DataBaseQuiz::createNew($userIQ, $minDifficult, $maxDifficult);
        $this->questions = Question::getPack($this->questionCount);
    }

    public function getId()
    {
        return $this->dbEntity->getId();
    }

    public function getUserIQ()
    {
        return $this->dbEntity->getUserIQ();
    }

    public function getMinDifficult()
    {
        return $this->dbEntity->getMinDifficult();
    }

    public function getMaxDifficult()
    {
        return $this->dbEntity->getMaxDifficult();
    }

    public function getResult()
    {
        return $this->dbEntity->getResult();
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setResult($result)
    {
        $this->dbEntity->setResult($result);
    }

    private function calculateDifficult()
    {
        return mt_rand($this->getMinDifficult(), $this->getMaxDifficult());
    }

    public static function getAll()
    {
        return DataBaseQuiz::getAll();
    }

    /**
     * Эмуляция теста.
     */
    public function emulate()
    {
        $rightAnswerCount = 0;
        foreach ($this->questions as &$question) {
            $question->setDifficult($this->calculateDifficult());
            $coefficient = $question->getDifficult() == 100 ? 0 : $this->getUserIQ() / ($question->getDifficult() + 1);
            if ($question->answer($coefficient)) {
                $rightAnswerCount++;
            }
        }
        $this->setResult($rightAnswerCount);
        $this->save();
    }

    private function save()
    {
        $this->dbEntity->save();
    }
}