<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "update_item_log".
 *
 * @property int $id
 * @property int $item_id
 * @property string $name
 * @property string $description
 * @property int $quantity
 * @property int $qty_on_order
 * @property int $qty_left
 * @property int $rent_per_day
 * @property double $height
 * @property double $breadth
 * @property double $length
 * @property string $material
 * @property string $type
 * @property string $updated_at
 * @property string $updated_by
 */
class UpdateItemLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'update_item_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'quantity', 'qty_on_order', 'qty_left', 'rent_per_day'], 'integer'],
            [['height', 'breadth', 'length'], 'number'],
            [['updated_at'], 'safe'],
            [['name', 'updated_by'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['material'], 'string', 'max' => 40],
            [['type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'name' => 'Name',
            'description' => 'Description',
            'quantity' => 'Quantity',
            'qty_on_order' => 'Qty On Order',
            'qty_left' => 'Qty Left',
            'rent_per_day' => 'Rent Per Day',
            'height' => 'Height',
            'breadth' => 'Breadth',
            'length' => 'Length',
            'material' => 'Material',
            'type' => 'Type',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
