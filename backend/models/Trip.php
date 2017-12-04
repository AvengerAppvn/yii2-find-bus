<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trip".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $post_username
 * @property string $post_facebook_uid
 * @property string $addr_from
 * @property string $addr_to
 * @property integer $slot
 * @property string $price
 * @property string $body
 * @property string $view
 * @property integer $category_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property integer $status
 * @property integer $type
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property TripCategory $category
 * @property User $createdBy
 * @property User $updatedBy
 * @property TripAttachment[] $tripAttachments
 */
class Trip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'post_username', 'post_facebook_uid', 'addr_from', 'addr_to', 'body'], 'required'],
            [['slot', 'category_id', 'status', 'type', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['body'], 'string'],
            [['slug', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['title', 'addr_from', 'addr_to'], 'string', 'max' => 512],
            [['post_username'], 'string', 'max' => 256],
            [['post_facebook_uid', 'price'], 'string', 'max' => 128],
            [['view'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => TripCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'post_username' => 'Post Username',
            'post_facebook_uid' => 'Post Facebook Uid',
            'addr_from' => 'Addr From',
            'addr_to' => 'Addr To',
            'slot' => 'Slot',
            'price' => 'Price',
            'body' => 'Body',
            'view' => 'View',
            'category_id' => 'Category ID',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path' => 'Thumbnail Path',
            'status' => 'Status',
            'type' => 'Type',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(TripCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTripAttachments()
    {
        return $this->hasMany(TripAttachment::className(), ['trip_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\TripQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TripQuery(get_called_class());
    }
}
