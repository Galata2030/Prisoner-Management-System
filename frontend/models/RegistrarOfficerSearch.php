<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\RegistrarOfficer;

/**
 * RegistrarOfficerSearch represents the model behind the search form of `frontend\models\RegistrarOfficer`.
 */
class RegistrarOfficerSearch extends RegistrarOfficer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ro_id', 'age'], 'integer'],
            [['first_name', 'last_name', 'sex', 'address'], 'safe'],
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
        $query = RegistrarOfficer::find();

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
            'ro_id' => $this->ro_id,
            'age' => $this->age,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
