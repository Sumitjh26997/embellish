<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DeleteItemLog;

/**
 * DeleteItemLogSearch represents the model behind the search form of `\backend\models\DeleteItemLog`.
 */
class DeleteItemLogSearch extends DeleteItemLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'quantity', 'qty_on_order', 'qty_left', 'rent_per_day'], 'integer'],
            [['name', 'description', 'material', 'type', 'deleted_on', 'deleted_by'], 'safe'],
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
        $query = DeleteItemLog::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'item_id' => $this->item_id,
            'quantity' => $this->quantity,
            'qty_on_order' => $this->qty_on_order,
            'qty_left' => $this->qty_left,
            'rent_per_day' => $this->rent_per_day,
            'height' => $this->height,
            'breadth' => $this->breadth,
            'length' => $this->length,
            'deleted_on' => $this->deleted_on,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by]);

        return $dataProvider;
    }
}
