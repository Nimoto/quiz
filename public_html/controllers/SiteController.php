<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\SignupForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Signup action.
     *
     * @return string view
     */
    public function actionSignup()
    {
        $type = Yii::$app->request->get('type') ? Yii::$app->request->get('type') : User::PERSON_ACCOUNT;

        $signupForm = (new SignupForm())->getForm($type);

        if ($signupForm->load(Yii::$app->request->post()) && $user = $signupForm->signup()) {
            Yii::$app->user->login($user, 3600 * 24 * 30);
            return $this->goHome();
        } else {
            return $this->render('signup', [
                'signupForm' => $signupForm,
            ]);
        }
    }
}
