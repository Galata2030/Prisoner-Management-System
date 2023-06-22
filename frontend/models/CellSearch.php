<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cell;

/**
 * CellSearch represents the model behind the search form of `frontend\models\Cell`.
 */
class CellSearch extends Cell
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_id', 'prisoner_id', 'bed_no', 'dorm_no'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Cell::find();

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
            'block_id' => $this->block_id,
            'prisoner_id' => $this->prisoner_id,
            'bed_no' => $this->bed_no,
            'dorm_no' => $this->dorm_no,
        ]);

        return $dataProvider;
    }
}
