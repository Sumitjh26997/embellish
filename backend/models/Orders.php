<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $order_id
 * @property int $user_id
 * @property string $order_start_date
 * @property string $order_end_date
 * @property string $order_timestap
 * @property string $pickup_time
 * @property int $sec_deposit
 * @property int $cart_amt
 * @property int $final_amt
 * @property string $return_date
 * @property int $fine
 * @property string $status
 *
 * @property OrderItem[] $orderItems
 * @property User $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
    */
    
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
    */

    public function rules()
    {
        return [
            [['user_id', 'order_start_date', 'order_end_date'], 'required'],
            [['user_id', 'sec_deposit', 'cart_amt', 'final_amt', 'fine'], 'integer'],
            [['order_start_date', 'order_end_date', 'order_timestap', 'pickup_time', 'return_date'], 'safe'],
            [['status'], 'string', 'max' => 15],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            ['order_start_date','validateDates'],
            //['order_end_date','validateReturn'],
            //[['order_end_date'] > ['order_start_date']],
        ];
    }

    public function validateDates(){
    if(strtotime($this->order_end_date) <= strtotime($this->order_start_date)){
        $this->addError('order_start_date','Please give correct Start and End dates');
        $this->addError('order_end_date','Please give correct Start and End dates');
        }
    }

    /*public function validateReturn(){
    if(strtotime($this->return_date) <= strtotime($this->order_end_date)){
        $this->addError('return_date','Please give correct Return and End dates');
        $this->addError('order_end_date','Please give correct Return and End dates');
        }
    }
    */

    /**
     * @inheritdoc
    */

    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'order_start_date' => 'Order Start Date',
            'order_end_date' => 'Order End Date',
            'order_timestap' => 'Order Timestap',
            'pickup_time' => 'Pickup Time',
            'sec_deposit' => 'Sec Deposit',
            'cart_amt' => 'Cart Amt',
            'final_amt' => 'Final Amt',
            'return_date' => 'Return Date',
            'fine' => 'Fine',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
