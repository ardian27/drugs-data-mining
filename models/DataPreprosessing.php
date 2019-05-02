<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_preprosessing".
 *
 * @property int $id_data
 * @property string $umur
 * @property string $jenis_kelamin
 * @property string $ras
 * @property string $jenis_obat_1
 * @property string $jenis_obat_2
 * @property string $jenis_obat_3
 * @property string $jenis_obat_4
 * @property string $jenis_obat_5
 * @property string $jenis_obat_6
 * @property string $jenis_obat_7
 */
class DataPreprosessing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_preprosessing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['umur'], 'string', 'max' => 9],
            [['jenis_kelamin', 'ras'], 'string', 'max' => 100],
            [['jenis_obat_1', 'jenis_obat_2'], 'string', 'max' => 36],
            [['jenis_obat_3', 'jenis_obat_4', 'jenis_obat_5', 'jenis_obat_6', 'jenis_obat_7'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_data' => 'Id Data',
            'umur' => 'Umur',
            'jenis_kelamin' => 'Jenis Kelamin',
            'ras' => 'Ras',
            'jenis_obat_1' => 'Jenis Obat 1',
            'jenis_obat_2' => 'Jenis Obat 2',
            'jenis_obat_3' => 'Jenis Obat 3',
            'jenis_obat_4' => 'Jenis Obat 4',
            'jenis_obat_5' => 'Jenis Obat 5',
            'jenis_obat_6' => 'Jenis Obat 6',
            'jenis_obat_7' => 'Jenis Obat 7',
        ];
    }
}
