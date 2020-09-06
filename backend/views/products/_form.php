<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use common\models\ParentCategories;
use common\models\Brands;

?>
<?php $form = ActiveForm::begin(); ?>
<div class="box-body">


	<?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'brand')->dropDownList(ArrayHelper::map(Brands::find()->all(), 'id', 'brand_name'),['prompt'=>'Select Brand','id'=>'brand']) ?> 

	
	<?= $form->field($model, 'p_cat')->dropDownList(ArrayHelper::map(ParentCategories::find()->all(), 'id', 'name'),['prompt'=>'Select Parent category','id'=>'p_cat']) ?> 

	<?=  $form->field($model, 'sub_cat')->widget(DepDrop::classname(), [
		'options' => ['id'=>'subcat-id'],
		'pluginOptions'=>[
			'depends'=>['p_cat'],
			'initialize' => true,
			'placeholder' => 'Select Sub Category...',
			'url' => Url::to(['/products/sub-category'])
		]
	]);
	?> 
</div>
<div class="box-footer">
	<?= Html::submitButton('Save', ['class' => 'btn btn-action btn-success ']) ?>
	<?= Html::a(Html::encode('Back'),['/products'],['class' => 'btn btn-action pull-right']) ?>
	

</div>

<?php ActiveForm::end(); ?>
