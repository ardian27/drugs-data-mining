<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cluster".
 *
 * @property int $id_cluster
 * @property int $jumlah_cluster
 */
class Cluster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cluster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [ 
            [['id_cluster', 'jumlah_cluster'], 'integer'],
            [['id_cluster'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cluster' => 'Id Cluster',
            'jumlah_cluster' => 'Jumlah Cluster',
        ];
    }
}
