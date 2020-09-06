<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "blog_post".
 *
 * @property int $id
 * @property string $title
 * @property string $summary
 * @property string $description
 * @property string $created_at
 * @property int $created_by
 *
 * @property User $createdBy
 */
class BlogPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'summary', 'description', 'created_by'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['created_by'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['summary'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'summary' => 'Summary',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
