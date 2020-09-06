     <?php 
     use yii\helpers\Html;
     use yii\grid\GridView;
     use yii\helpers\Url;
     $this->title = 'Products list';
     $this->params['breadcrumbs'][] = $this->title;
     ?>

     <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
             <?= Html::a('Add Product', ['create'], ['class' => 'btn bg-navy btn-flat margin']) ?> 
             <?= Html::a('Add Category', ['/category/create'], ['class' => 'btn bg-navy btn-flat margin']) ?>
             <?= Html::a('Add Brand', ['/brand/create'], ['class' => 'btn bg-navy btn-flat margin']) ?>

          </div>
          <div class="box-body table-responsive no-padding">
            <?=
            GridView::widget([
              'dataProvider' => $dataProvider,
              'filterModel' => $searchModel,
              'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                  'label' => 'Product Name',
                  'attribute' => 'product_name',
                ],
                [
                  'label' => 'Brand',
                  'attribute' => 'brand0.brand_name',
                ],
                ['class' => 'yii\grid\ActionColumn',                

                  'template' => '{view} {update} {delete} {myButton}',  // the default buttons + your custom button
                  'buttons' => [
                    'myButton' => function($url, $model, $key) {     // render your custom button
                        return Html::a('<i class="fa fa-users"></i>',Url::to(['/products/brand']),['class'=>'btn btn-danger']);
                    }
                  ]

                ],
              ]
            ]);
            ?>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>


