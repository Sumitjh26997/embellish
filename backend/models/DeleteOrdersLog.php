<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "delete_orders_log".
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property string $order_start_date
 * @property string $order_end_date
 * @property string $order_timestap
 * @property int $sec_deposit
 * @property int $cart_amt
 * @property int $final_amt
 * @property string $return_date
 * @property int $fine
 * @property string $status
 * @property string $deleted_on
 * @property string $deleted_by
 */
class DeleteOrdersLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delete_orders_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'user_id', 'sec_deposit', 'cart_amt', 'final_amt', 'fine'], 'integer'],
            [['order_start_date', 'order_end_date', 'order_timestap', 'return_date', 'deleted_on'], 'safe'],
            [['status'], 'string', 'max' => 15],
            [['deleted_by'], 'string', 'max' => 50],
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
            'user_id' => 'User ID',
            'order_start_date' => 'Order Start Date',
            'order_end_date' => 'Order End Date',
            'order_timestap' => 'Order Timestap',
            'sec_deposit' => 'Sec Deposit',
            'cart_amt' => 'Cart Amt',
            'final_amt' => 'Final Amt',
            'return_date' => 'Return Date',
            'fine' => 'Fine',
            'status' => 'Status',
            'deleted_on' => 'Deleted On',
            'deleted_by' => 'Deleted By',
        ];
    }
}
