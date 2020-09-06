<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
         <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>
           <?= $form->field($model, 'full_name')->textInput(['autofocus' => true]) ?>
          <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
          <?= $form->field($model, 'password')->passwordInput() ?>
           <?= $form->field($model, 're_password')->passwordInput() ?>
          
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        <?php ActiveForm::end(); ?>      

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>

        <a href="login.html" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->