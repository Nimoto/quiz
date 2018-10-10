<?php

namespace quiz\core;

trait Validator
{
    private $rules = [];

    /**
     * Валидация конкретного поля.
     *
     * @param string $field - имя поля, которое необходимо подвергнуть процедуре валидации
     * @return bool
     */
    private function validateField($field)
    {
        if (array_key_exists($field, $this->rules)) {
            $rules = $this->rules[$field];
            if (isset($rules['range'])
                && ($this->$field > $rules['range']['max'] || $this->$field < $rules['range']['min'])
            ) {
                return false;
            }
        }
        return true;
    }


    /**
     * Валидация всех полей, указаных в массиве $rules
     *
     * @param array $rules - массив правил валидации,
     * передается из класса, в котором используется трейт
     */
    public function validate($rules)
    {
        $this->rules = $rules;
        foreach ($this as $key => $value) {
            if (!$this->validateField($key)) {
                trigger_error('Wrong value in field ' . $key, E_USER_ERROR);
            }
        }
    }
}