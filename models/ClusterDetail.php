<?php

namespace app\models;

use app\models\DataAwal;

use Yii;

/**
 * This is the model class for table "cluster_detail".
 *
 * @property int $id_cluster_detail
 * @property int $id_cluster
 * @property int $id_data
 * @property int $anggota_cluster
 */
class ClusterDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cluster_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cluster', 'id_data', 'anggota_cluster'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cluster_detail' => 'Id Cluster Detail',
            'id_cluster' => 'ID Cluster',
            'id_data' => 'ID Data',
            'anggota_cluster' => 'Anggota Cluster',
        ];
    }

//     public function Balance($id)
// {

//     $data = DataSeleksi::findOne(['id_data'=>$id]);
//     $hasil = 

     
//     return $hasil;
// }
    public function getAwal()
    {
        return $this->hasOne(DataAwal::className(), ['id_data' => 'id_data']);
    }
}
