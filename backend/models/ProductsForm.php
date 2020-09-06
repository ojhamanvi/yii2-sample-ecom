<?php

namespace backend\models;


use Yii;
use yii\base\Model;
use common\models\Products;
use common\models\SubCategories;
use yii\base\ErrorException;

/**
 * This is the model class for table "Products".
 */

class ProductsForm extends Model
{
   
    public $product_name;
    public $id;
    public $sku;
    public $description;
    public $brand;
    public $p_cat;
    public $sub_cat;
    public $created_at;
    public $created_by;
    const UPDATE = 'update';
    const CREATE ='create';

    public static function tableName()
    {
        return 'products';
    }


   public function rules()
    {
        return [
            [['product_name', 'sku', 'brand','p_cat','sub_cat'], 'required'],  
            [['description'],'required','message'=>'This field is required'],    
            [['product_name','sku','description'], 'string', 'max' => 255],                    
            ['sku', 'unique', 'skipOnError' => false, 'targetClass' => Products::className(), 'targetAttribute' => 'sku', 'message' => 'This SKU has already been taken.', 'filter' => ['!=', 'product_name', $this->product_name], 'on' => self::UPDATE],
        ];
    }


    public function scenarios()
    {
        return [

            self::UPDATE => ['product_name', 'sku','brand','p_cat','sub_cat','description'],
            self::CREATE => ['product_name', 'sku','brand','p_cat','sub_cat','description'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'sku' => Yii::t('app', 'Sku Name'),
            'p_cat' => Yii::t('app', 'Parent Category'),
            'created_at' => Yii::t('app', 'Created At'),
            'brand' => Yii::t('app', 'Brand'),
            'sub_cat' => Yii::t('app', 'Sub category'),
        ];
    }


    public function insert(){

        $model = new Products();
        $model->setAttributes($this->getAttributes());       
        $model->created_at = date('Y-m-d H:i:s');
        $model->created_by = 1;

        if(!$model->save()){
            throw new ErrorException(json_encode($model->getErrors()));
        }
        return true;
    }

    public function update($id){
// print_r($this->getAttributes()); die;
        $model = Products::findOne(['id' => $id]);
        $model->setAttributes($this->getAttributes());       
        $model->created_at = date('Y-m-d H:i:s');
        $model->created_by = 1;

        if(!$model->save()){
            throw new ErrorException(json_encode($model->getErrors()));
        }
        return true;
    }


    public function setData($id){
        $model = Products::findOne(['id' => $id]);
        if(!$model){
            throw new NotFoundHttpException();
        }
        $this->setAttributes($model->getAttributes());
    }

    public static function getSubcat($id){
        
         $cats = SubCategories::find()->where(['p_category'=>$id])->all();
         return $cats;
    }

    


}

