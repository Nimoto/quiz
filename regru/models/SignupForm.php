<?php

namespace app\models;

use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $type;
    public $person_name;
    public $ITN;
    public $email;
    public $password;

    /**
     * Signs user up.
     *
     * @return User|false the saved model or null if saving fails
     */
    public function signup()
    {
        $user = new User();

        if ($this->validate() && $user->load(['User' => $this->attributes])) {
            $user->setPassword($this->password);
            $user->generateAuthKey();
            return $user->save() ? $user : false;
        }

        return false;
    }
}
