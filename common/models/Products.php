<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $product_name
 * @property string $sku
 * @property string $description
 * @property int $brand
 * @property int $p_cat
 * @property int $sub_cat
 * @property string $created_at
 * @property int $created_by
 *
 * @property Brands $brand0
 * @property ParentCategories $pCat
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'sku', 'description', 'brand', 'p_cat', 'sub_cat', 'created_at', 'created_by'], 'required'],
            [['description'], 'string'],
            [['brand', 'p_cat', 'sub_cat', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['product_name', 'sku'], 'string', 'max' => 255],
            [['brand'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brand' => 'id']],
            [['p_cat'], 'exist', 'skipOnError' => true, 'targetClass' => ParentCategories::className(), 'targetAttribute' => ['p_cat' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'sku' => 'Sku',
            'description' => 'Description',
            'brand' => 'Brand',
            'p_cat' => 'P Cat',
            'sub_cat' => 'Sub Cat',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Brand0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BrandsQuery
     */
    public function getBrand0()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand']);
    }

    /**
     * Gets query for [[PCat]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ParentCategoriesQuery
     */
    public function getPCat()
    {
        return $this->hasOne(ParentCategories::className(), ['id' => 'p_cat']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductsQuery(get_called_class());
    }
}
