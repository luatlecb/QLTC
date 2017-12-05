<?php

namespace app\modules\taichinh\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\taichinh\models\taiChinh;

/**
 * taichinhSearch represents the model behind the search form about `app\modules\taichinh\models\taiChinh`.
 */
class taichinhSearch extends taiChinh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['nguon_thu', 'so_du'], 'number'],
            [['date_created'], 'safe'],
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
        $query = taiChinh::find();

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
            'user_id' => $this->user_id,
            'nguon_thu' => $this->nguon_thu,
            'so_du' => $this->so_du,
            'date_created' => $this->date_created,
        ]);

        return $dataProvider;
    }
}
