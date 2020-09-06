<?php

use yii\helpers\Html;


$this->title = 'Update Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-lg-12">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?= $this->title ?></h3>
		</div>
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
</div>
</div>
