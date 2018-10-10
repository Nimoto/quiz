<?php
/**
 * DAO-модель для сущности Quiz
 */

namespace quiz\models;

use quiz\core\Application;
use quiz\core\Validator;

class DataBaseQuiz
{
    use Validator;

    private static $quizList = [];
    private static $tableName = 'quiz';

    private $id;
    private $userIQ;
    private $minDifficult;
    private $maxDifficult;
    private $result;
    private $isNew = true;
    private $validationRules = [
        'userIQ' => [
            'range' => [
                'min' => 0,
                'max' => 100
            ]
        ],
        'minDifficult' => [
            'range' => [
                'min' => 0,
                'max' => 100
            ]
        ],
        'maxDifficult' => [
            'range' => [
                'min' => 0,
                'max' => 100
            ]
        ],
    ];

    private function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserIQ()
    {
        return $this->userIQ;
    }

    public function getMinDifficult()
    {
        return $this->minDifficult;
    }

    public function getMaxDifficult()
    {
        return $this->maxDifficult;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public static function createNew($userIQ, $minDifficult, $maxDifficult)
    {
        $dbQuiz = new DataBaseQuiz();
        $dbQuiz->userIQ = $userIQ;
        $dbQuiz->minDifficult = $minDifficult;
        $dbQuiz->maxDifficult = $maxDifficult;

        if ($dbQuiz->minDifficult >= $dbQuiz->maxDifficult) {
            $replace = $dbQuiz->minDifficult;
            $dbQuiz->minDifficult = $dbQuiz->maxDifficult;
            $dbQuiz->maxDifficult = $replace;
        }

        $dbQuiz->validate($dbQuiz->validationRules);
        return $dbQuiz;
    }

    public static function getAll()
    {
        if (empty(self::$quizList)) {
            $data = Application::$dbConnection->query('SELECT * FROM ' . DataBaseQuiz::$tableName . ' WHERE 1;');
            foreach ($data as $row) {
                $dbQuiz = new DataBaseQuiz();
                $dbQuiz->id = $row['id'];
                $dbQuiz->userIQ = $row['user_iq'];
                $dbQuiz->minDifficult = $row['min_difficult'];
                $dbQuiz->maxDifficult = $row['max_difficult'];
                $dbQuiz->result = $row['result'];
                self::$quizList[] = $dbQuiz;
            }
        }
        return self::$quizList;
    }

    public function save()
    {
        if ($this->isNew) {
            Application::$dbConnection->query('INSERT INTO ' . DataBaseQuiz::$tableName . '(`user_iq`, `min_difficult`, `max_difficult`, `result`) VALUES ('
                . $this->userIQ . ', '
                . $this->minDifficult . ', '
                . $this->maxDifficult . ', '
                . $this->result
                . ');');
        }
    }
}