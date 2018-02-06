<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property string $name
 * @property int $order_id
 * @property int $rating
 * @property string $feedback
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'order_id', 'rating', 'feedback'], 'required'],
            [['order_id', 'rating'], 'integer'],
            [['feedback'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['order_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'order_id' => 'Order ID',
            'rating' => 'Rating',
            'feedback' => 'Feedback',
        ];
    }
}
