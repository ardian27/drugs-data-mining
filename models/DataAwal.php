<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_awal".
 *
 * @property int $id_data
 * @property string $tgl_kematian
 * @property string $waktu_kematian
 * @property string $penyebab_kematian
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
class DataAwal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_awal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_kematian', 'waktu_kematian'], 'string', 'max' => 10],
            [['penyebab_kematian'], 'string', 'max' => 15],
            [['umur'], 'string', 'max' => 3],
            [['jenis_kelamin'], 'string', 'max' => 6],
            [['ras'], 'string', 'max' => 14],
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
            'tgl_kematian' => 'Tgl Kematian',
            'waktu_kematian' => 'Waktu Kematian',
            'penyebab_kematian' => 'Penyebab Kematian',
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
