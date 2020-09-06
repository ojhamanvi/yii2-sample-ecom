<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\ProductsSearch;
use backend\models\ProductsForm;

class ProductsController extends Controller
{

    public function actionIndex()
    {

    	$searchModel = new ProductsSearch();     
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }

    public function actionCreate(){
    	try{
    		
            $model = new ProductsForm();
            $model->setScenario(ProductsForm::CREATE);

            if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && 
                $model->validate())
            {
                $model->insert();
                Yii::$app->session->setFlash('success','Product Added Successfully');
                return $this->redirect(['index']);
            }

        }catch( ErrorException $ex){
            Yii::$app->session->setFlash('error',$ex->getMessage());
            return $this->redirect(['index']);
        }

        return $this->render('create',[
            'model' => $model
        ]);
    }

    public function actionUpdate($id){
        try{
            
            $model = new ProductsForm();
            $model->setScenario(ProductsForm::UPDATE);

            if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && 
                $model->validate())
            {
                $model->update($id);
                Yii::$app->session->setFlash('success','Product Updated Successfully');
                return $this->redirect(['index']);
            }

        }catch( ErrorException $ex){
            Yii::$app->session->setFlash('error',$ex->getMessage());
            return $this->redirect(['index']);
        }

        $model->setData($id);
        return $this->render('update',[
            'model' => $model
        ]);
    }

    public function actionSubCategory() {
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        $post = Yii::$app->request->post();

        if (isset($post['depdrop_parents'])) {
        $parents = $post['depdrop_parents'];
        //Array ( [depdrop_parents] => Array ( [0] => 2 ) [depdrop_all_params] => Array ( [pcat] => 2 ) )
        if ($parents != null) {
            $cat_id = $parents[0];
            
            $subCats = ProductsForm::getSubcat($cat_id);
            
            if (!$subCats) {
                return ['output' => '', 'selected' => ''];
            }
            
            $st = [];
            foreach ($subCats as $subcat) {
                $st[] = ['id' => $subcat['id'], 'name' => $subcat['name']];
            }
            return ['output' => $st, 'selected' => $cat_id];
            
        }
        }
    }

}
