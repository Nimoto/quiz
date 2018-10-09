<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $personSignupForm app\models\PersonSignupForm */
/* @var $companySignupForm app\models\CompanySignupForm */

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
        <ul class="nav nav-tabs">
            <li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
            <li><a href="#company" data-toggle="tab">Company</a></li>
        </ul>
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="personal">
                <?php $form = ActiveForm::begin(['id' => 'signup-form-personal']); ?>

                <?= $form->field($personSignupForm, 'person_name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($personSignupForm, 'email')->textInput(['type' => 'email']) ?>
                <?= $form->field($personSignupForm, 'ITN')->textInput() ?>
                <?= $form->field($personSignupForm, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="tab-pane" id="company">
                <?php $form = ActiveForm::begin(['id' => 'signup-form-company']); ?>

                <?= $form->field($companySignupForm, 'person_name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($companySignupForm, 'email')->textInput(['type' => 'email']) ?>
                <?= $form->field($companySignupForm, 'ITN')->textInput() ?>
                <?= $form->field($companySignupForm, 'company_name')->textInput() ?>
                <?= $form->field($companySignupForm, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>