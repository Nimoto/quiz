<?php

namespace app\models;

use app\models\SignupForm;
use Yii;
use yii\base\Model;

class CompanySignupForm extends SignupForm
{
    public $company_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_name', 'company_name', 'email', 'ITN', 'password'], 'required'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email has already been taken.'],
            ['type', 'default', 'value' => User::COMPANY_ACCOUNT],
            [['ITN', 'type'], 'integer'],
            [['person_name', 'company_name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
            ['password', 'string', 'min' => 6]
        ];
    }
}