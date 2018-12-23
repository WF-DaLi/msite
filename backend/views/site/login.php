<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\assets\AppAsset;

$this->title = 'Login';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div class=" wrap layui-bg-black">
    <div class="container">
        <div class="site-login col-md-4 col-md-offset-3"  style="background:dimgray;margin-top:80px;width:50%" >
            <div style="padding-top:20px;width:100%;text-align: center;position: relative">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="row ">
                <div class="col-md-5 col-md-offset-3" style="margin-top:10px;width:60%;padding-top:10px;position:relative;">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Name') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <div class="form-group col-md-offset-4">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
             </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>



</html>
<?php $this->endPage() ?>

