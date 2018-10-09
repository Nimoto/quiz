<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><?= \yii\helpers\Html::a('Sign Up',
                \yii\helpers\Url::to(['site/signup']),
                ['class' => '"btn btn-lg btn-success']); ?></p>
    </div>
</div>
