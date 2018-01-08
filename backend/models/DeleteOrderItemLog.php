<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "delete_order_item_log".
 *
 * @property int $id
 * @property int $order_id
 * @property int $item_id
 * @property int $qty_per_item
 */
class DeleteOrderItemLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delete_order_item_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'item_id', 'qty_per_item'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'item_id' => 'Item ID',
            'qty_per_item' => 'Qty Per Item',
        ];
    }
}
