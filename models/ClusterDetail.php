<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cluster_detail".
 *
 * @property int $id_cluster_detail
 * @property int $id_cluster
 * @property int $id_data
 * @property double $x1
 * @property double $x2
 * @property double $x3
 * @property double $x4
 * @property double $x5
 * @property double $x6
 * @property double $x7
 * @property double $x8
 * @property double $x9
 * @property double $10
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
            [['id_cluster', 'id_data'], 'integer'],
            [['x1', 'x2', 'x3', 'x4', 'x5', 'x6', 'x7', 'x8', 'x9', '10'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cluster_detail' => 'Id Cluster Detail',
            'id_cluster' => 'Id Cluster',
            'id_data' => 'Id Data',
            'x1' => 'X1',
            'x2' => 'X2',
            'x3' => 'X3',
            'x4' => 'X4',
            'x5' => 'X5',
            'x6' => 'X6',
            'x7' => 'X7',
            'x8' => 'X8',
            'x9' => 'X9',
            '10' => '10',
        ];
    }
}
