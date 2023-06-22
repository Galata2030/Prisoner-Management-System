<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Visitors;

/**
 * VisitorsSearch represents the model behind the search form of `frontend\models\Visitors`.
 */
class VisitorsSearch extends Visitors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visitor_id', 'prisoner_id'], 'integer'],
            [['first_name', 'last_name', 'sex', 'address', 'phone_no'], 'safe'],
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
        $query = Visitors::find();

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
            'visitor_id' => $this->visitor_id,
            'prisoner_id' => $this->prisoner_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no]);

        return $dataProvider;
    }
}
