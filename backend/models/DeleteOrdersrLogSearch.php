<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DeleteOrdersLog;

/**
 * DeleteOrdersrLogSearch represents the model behind the search form of `\backend\models\DeleteOrdersLog`.
 */
class DeleteOrdersrLogSearch extends DeleteOrdersLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'user_id', 'sec_deposit', 'cart_amt', 'final_amt', 'fine'], 'integer'],
            [['order_start_date', 'order_end_date', 'order_timestap', 'return_date', 'status', 'deleted_on', 'deleted_by'], 'safe'],
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
        $query = DeleteOrdersLog::find();

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
            'order_id' => $this->order_id,
            'user_id' => $this->user_id,
            'order_start_date' => $this->order_start_date,
            'order_end_date' => $this->order_end_date,
            'order_timestap' => $this->order_timestap,
            'sec_deposit' => $this->sec_deposit,
            'cart_amt' => $this->cart_amt,
            'final_amt' => $this->final_amt,
            'return_date' => $this->return_date,
            'fine' => $this->fine,
            'deleted_on' => $this->deleted_on,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by]);

        return $dataProvider;
    }
}
