<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "delete_item_log".
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
 * @property string $deleted_on
 * @property string $deleted_by
 */
class DeleteItemLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delete_item_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'quantity', 'qty_on_order', 'qty_left', 'rent_per_day'], 'integer'],
            [['height', 'breadth', 'length'], 'number'],
            [['deleted_on'], 'safe'],
            [['name', 'deleted_by'], 'string', 'max' => 50],
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
            'deleted_on' => 'Deleted On',
            'deleted_by' => 'Deleted By',
        ];
    }
}
