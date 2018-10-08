<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $signupForm app\models\SignupForm */

use app\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

            <?= $form->field($signupForm, 'person_name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($signupForm, 'email')->textInput(['type' => 'email']) ?>
            <?= $form->field($signupForm, 'ITN')->textInput() ?>

            <?php
            if ($signupForm->getType() == User::COMPANY_ACCOUNT) {
                echo $form->field($signupForm, 'company_name')->textInput();
            }
            ?>

            <?= $form->field($signupForm, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>