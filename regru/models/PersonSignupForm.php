<?php

namespace app\models;

use app\models\SignupForm;

class PersonSignupForm extends SignupForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_name', 'email', 'ITN', 'password'], 'required'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email has already been taken.'],
            ['type', 'default', 'value' => User::PERSON_ACCOUNT],
            [['ITN', 'type'], 'integer'],
            [['person_name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
            ['password', 'string', 'min' => 6]
        ];
    }
}