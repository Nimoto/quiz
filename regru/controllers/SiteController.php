<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\CompanySignupForm;
use app\models\PersonSignupForm;

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
        $personSignupForm = new PersonSignupForm();
        $companySignupForm = new CompanySignupForm();
        $post = Yii::$app->request->post();

        if (isset($post['PersonSignupForm'])) {
            $signupForm = $personSignupForm;
        } else if (isset($post['CompanySignupForm'])) {
            $signupForm = $companySignupForm;
        }

        if (isset($signupForm) && $signupForm->load($post) && $user = $signupForm->signup()) {
            Yii::$app->user->login($user, 3600 * 24 * 30);
            return $this->goHome();
        } else {
            return $this->render('signup', [
                'personSignupForm' => $personSignupForm,
                'companySignupForm' => $companySignupForm,
            ]);
        }
    }
}
