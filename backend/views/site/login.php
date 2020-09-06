<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login Into Your Account</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
          <div class="row">
            <div class="col-xs-8">    
              <?= $form->field($model, 'rememberMe')->checkbox() ?>                    
            </div><!-- /.col -->
            <div class="col-xs-4">
             <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div><!-- /.col -->
          </div>
        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="<?= yii\helpers\Url::to(['/site/signup'])  ?>" class="text-center">Register</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
