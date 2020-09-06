<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sub_categories".
 *
 * @property int $id
 * @property string $name
 * @property int $p_category
 * @property int $created_by
 * @property string $created_at
 *
 * @property ParentCategories $pCategory
 */
class SubCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'p_category', 'created_by', 'created_at'], 'required'],
            [['p_category', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['p_category'], 'exist', 'skipOnError' => true, 'targetClass' => ParentCategories::className(), 'targetAttribute' => ['p_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'p_category' => 'P Category',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[PCategory]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ParentCategoriesQuery
     */
    public function getPCategory()
    {
        return $this->hasOne(ParentCategories::className(), ['id' => 'p_category']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductsSubCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductsSubCategoriesQuery(get_called_class());
    }
}
