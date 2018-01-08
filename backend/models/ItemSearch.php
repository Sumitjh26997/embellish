<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Item;

/**
 * ItemSearch represents the model behind the search form of `\backend\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'quantity', 'qty_on_order', 'qty_left', 'rent_per_day'], 'integer'],
            [['name', 'description', 'color', 'material', 'type', 'featured'], 'safe'],
            [['height', 'breadth', 'length'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Item::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['item_id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'item_id' => $this->item_id,
            'quantity' => $this->quantity,
            'qty_on_order' => $this->qty_on_order,
            'qty_left' => $this->qty_left,
            'rent_per_day' => $this->rent_per_day,
            'height' => $this->height,
            'breadth' => $this->breadth,
            'length' => $this->length,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'featured', $this->featured]);

        return $dataProvider;
    }
}
