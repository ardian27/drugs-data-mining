<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataAwal;

/**
 * DataAwalSearch represents the model behind the search form about `app\models\DataAwal`.
 */
class DataAwalSearch extends DataAwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_data'], 'integer'],
            [['tgl_kematian', 'waktu_kematian', 'penyebab_kematian', 'umur', 'jenis_kelamin', 'ras', 'jenis_obat_1', 'jenis_obat_2', 'jenis_obat_3', 'jenis_obat_4', 'jenis_obat_5', 'jenis_obat_6', 'jenis_obat_7'], 'safe'],
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
        $query = DataAwal::find();

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
            'id_data' => $this->id_data,
        ]);

        $query->andFilterWhere(['like', 'tgl_kematian', $this->tgl_kematian])
            ->andFilterWhere(['like', 'waktu_kematian', $this->waktu_kematian])
            ->andFilterWhere(['like', 'penyebab_kematian', $this->penyebab_kematian])
            ->andFilterWhere(['like', 'umur', $this->umur])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'ras', $this->ras])
            ->andFilterWhere(['like', 'jenis_obat_1', $this->jenis_obat_1])
            ->andFilterWhere(['like', 'jenis_obat_2', $this->jenis_obat_2])
            ->andFilterWhere(['like', 'jenis_obat_3', $this->jenis_obat_3])
            ->andFilterWhere(['like', 'jenis_obat_4', $this->jenis_obat_4])
            ->andFilterWhere(['like', 'jenis_obat_5', $this->jenis_obat_5])
            ->andFilterWhere(['like', 'jenis_obat_6', $this->jenis_obat_6])
            ->andFilterWhere(['like', 'jenis_obat_7', $this->jenis_obat_7]);

        return $dataProvider;
    }
}
