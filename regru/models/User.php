<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $person_name
 * @property string $company_name
 * @property string $email
 * @property string $auth_key
 * @property int $ITN
 * @property int $type 1 - personal account, 2 - company account
 * @property string $password_hash
 * @property string $password_reset_token
 */
class User extends ActiveRecord implements IdentityInterface
{

    const PERSON_ACCOUNT = 1;
    const COMPANY_ACCOUNT = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_name', 'email', 'ITN', 'password_hash'], 'required'],
            ['type', 'default', 'value' => self::PERSON_ACCOUNT],
            [['ITN', 'type'], 'integer'],
            [['person_name', 'company_name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
            [['password_hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_name' => 'Person Name',
            'company_name' => 'Company Name',
            'email' => 'Email',
            'ITN' => 'Itn',
            'type' => 'Type',
            'password_hash' => 'Password Hash'
        ];
    }

    /**
     * Set user password hash
     *
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    static function getByEmail($email)
    {
        return self::find()->where(['email' => $email])->one();
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}
