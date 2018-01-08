<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $item_id
 * @property string $name
 * @property string $description
 * @property int $quantity
 * @property int $qty_on_order
 * @property int $qty_left
 * @property int $rent_per_day
 * @property string $color
 * @property double $height
 * @property double $breadth
 * @property double $length
 * @property string $material
 * @property string $type
 * @property string $featured
 *
 * @property Itemimage[] $itemimages
 * @property OrderItem[] $orderItems
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantity', 'qty_on_order', 'qty_left', 'rent_per_day'], 'integer'],
            [['color', 'featured'], 'required'],
            [['height', 'breadth', 'length'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['color', 'type'], 'string', 'max' => 20],
            [['material'], 'string', 'max' => 40],
            [['featured'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'name' => 'Name',
            'description' => 'Description',
            'quantity' => 'Quantity',
            'qty_on_order' => 'Qty On Order',
            'qty_left' => 'Qty Left',
            'rent_per_day' => 'Rent Per Day',
            'color' => 'Color',
            'height' => 'Height',
            'breadth' => 'Breadth',
            'length' => 'Length',
            'material' => 'Material',
            'type' => 'Type',
            'featured' => 'Featured',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemimages()
    {
        return $this->hasMany(Itemimage::className(), ['item_id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['item_id' => 'item_id']);
    }
}
