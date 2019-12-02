<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClusterDetail;

/**
 * ClusterDetailSearch represents the model behind the search form about `app\models\ClusterDetail`.
 */
class ClusterDetailSearch extends ClusterDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cluster_detail', 'id_cluster', 'id_data'], 'integer'],
            [['x1', 'x2', 'x3', 'x4', 'x5', 'x6', 'x7', 'x8', 'x9', 'x10'], 'number'],
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
        $query = ClusterDetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_cluster_detail' => $this->id_cluster_detail,
            'id_cluster' => $this->id_cluster,
            'id_data' => $this->id_data,
            'x1' => $this->x1,
            'x2' => $this->x2,
            'x3' => $this->x3,
            'x4' => $this->x4,
            'x5' => $this->x5,
            'x6' => $this->x6,
            'x7' => $this->x7,
            'x8' => $this->x8,
            'x9' => $this->x9,
            'x10' => $this->x10,
        ]);

        return $dataProvider;
    }
}
