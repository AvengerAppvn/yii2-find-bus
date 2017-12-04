<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trip_category".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property integer $parent_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Trip[] $trips
 * @property TripCategory $parent
 * @property TripCategory[] $tripCategories
 */
class TripCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trip_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title'], 'required'],
            [['body'], 'string'],
            [['parent_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['slug'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => TripCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(TripCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTripCategories()
    {
        return $this->hasMany(TripCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TripCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TripCategoryQuery(get_called_class());
    }
}
