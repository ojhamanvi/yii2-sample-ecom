<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "parent_categories".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property int $created_by
 *
 * @property SubCategories[] $subCategories
 */
class ParentCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parent_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'created_by'], 'required'],
            [['created_at'], 'safe'],
            [['created_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[SubCategories]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SubCategoriesQuery
     */
    public function getSubCategories()
    {
        return $this->hasMany(SubCategories::className(), ['p_category' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductsCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductsCategoriesQuery(get_called_class());
    }
}
