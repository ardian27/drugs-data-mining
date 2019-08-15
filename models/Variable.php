<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "variable".
 *
 * @property int $id
 * @property int $cluster
 */
class Variable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cluster'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cluster' => 'Cluster',
        ];
    }
}
