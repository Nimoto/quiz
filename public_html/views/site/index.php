<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><?= \yii\helpers\Html::a('Create new Personal Account',
                \yii\helpers\Url::to(['site/signup', 'type' => \app\models\User::PERSON_ACCOUNT]),
                ['class' => '"btn btn-lg btn-success']); ?></p>
        <p><?= \yii\helpers\Html::a('Create new Company Account',
                \yii\helpers\Url::to(['site/signup', 'type' => \app\models\User::COMPANY_ACCOUNT]),
                ['class' => '"btn btn-lg btn-success']); ?></p>
    </div>
</div>
