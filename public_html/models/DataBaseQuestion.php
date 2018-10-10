<?php
/**
 * DAO-модель для сущности Question
 */

namespace quiz\models;

use quiz\core\Application;

class DataBaseQuestion
{
    private static $tableName = 'questions';
    private $id;
    private $frequency;
    private static $questions = [];

    public function __construct($id, $frequency)
    {
        $this->id = $id;
        $this->frequency = $frequency;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFrequency()
    {
        return $this->frequency;
    }

    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * Получение набора вопросов для теста.
     *
     * @param int $questionCount - колтчество элементов для выборки
     * @return Question[] array
     */
    public static function getPack($questionCount)
    {
        $questions = [];
        if (empty(self::$questions)) {
            $data = Application::$dbConnection
                ->query('SELECT id, frequency, ((RAND()*(1-0.8)+0.8) * frequency) as v FROM ' . self::$tableName . ' WHERE 1 ORDER BY v LIMIT ' . $questionCount);
            foreach ($data as $row) {
                self::$questions[$row['id']] = new DataBaseQuestion($row['id'], $row['frequency']);
                $questions[] = new Question(self::$questions[$row['id']]);
            }
            self::incrementFrequencyPack();
        }
        return $questions;
    }

    private static function incrementFrequencyPack()
    {
        if (!empty(self::$questions)) {
            Application::$dbConnection->query(
                'UPDATE ' . DataBaseQuestion::$tableName
                . ' SET frequency = frequency + 1 WHERE id IN ('
                . implode(',', array_keys(self::$questions)) . ')');
        }
    }
}