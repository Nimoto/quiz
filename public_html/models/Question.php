<?php

namespace quiz\models;

class Question
{
    private $dbEntity;
    private $isRightAnswer;
    private $difficult;

    /**
     * @param DataBaseQuestion $dbEntity - привязка к DAO модели
     */
    public function __construct($dbEntity)
    {
        $this->dbEntity = $dbEntity;
    }

    public function getId()
    {
        return $this->dbEntity->getId();
    }

    public function getFrequency()
    {
        return $this->dbEntity->getFrequency();
    }

    public function getIsRightAnswer()
    {
        return $this->isRightAnswer;
    }

    public function getDifficult()
    {
        return $this->difficult;
    }

    public function setDifficult($difficult)
    {
        $this->difficult = $difficult;
    }

    public static function getPack($questionCount)
    {
        return DataBaseQuestion::getPack($questionCount);
    }

    /**
     * Вычисление правильности ответа
     */
    public function answer($coefficient)
    {
        $this->isRightAnswer = mt_rand(85, 100) * 0.01 * $coefficient >= 1 ? true : false;
        return $this->isRightAnswer;
    }
}