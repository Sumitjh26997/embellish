<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "itemimage".
 *
 * @property int $image_id
 * @property int $item_id
 * @property string $image
 *
 * @property Item $item
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'itemimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id'], 'integer'],
            [['image'], 'file', 'extensions' => 'png,jpg,jpeg,gif', 'maxFiles' => 10, 'skipOnEmpty' => false],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'item_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image_id' => 'Image ID',
            'item_id' => 'Item ID',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['item_id' => 'item_id']);
    }

    public function getImageurl()
    {
    return Yii::$app->request->BaseUrl.'/../images/product-details/'.$this->image;
    }
}
