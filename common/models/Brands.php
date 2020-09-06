<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $brand_name
 * @property string $created_at
 * @property int $created_by
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_name', 'created_at', 'created_by'], 'required'],
            [['created_at'], 'safe'],
            [['created_by'], 'integer'],
            [['brand_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_name' => 'Brand Name',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BrandsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BrandsQuery(get_called_class());
    }
}
