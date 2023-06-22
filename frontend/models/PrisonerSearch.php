<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Prisoner;

/**
 * PrisonerSearch represents the model behind the search form of `frontend\models\Prisoner`.
 */
class PrisonerSearch extends Prisoner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prisoner_id', 'age', 'visitor_id'], 'integer'],
            [['first_name', 'last_name', 'sex', 'entry_date', 'release_date', 'case', 'region', 'zone', 'woreda', 'kebele', 'status'], 'safe'],
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
        $query = Prisoner::find();

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
            'prisoner_id' => $this->prisoner_id,
            // 'age' => $this->age,
            // 'entry_date' => $this->entry_date,
            // 'release_date' => $this->release_date,
            // 'visitor_id' => $this->visitor_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'case', $this->case])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'zone', $this->zone])
            ->andFilterWhere(['like', 'woreda', $this->woreda])
            ->andFilterWhere(['like', 'kebele', $this->kebele]);

        return $dataProvider;
    }
}
