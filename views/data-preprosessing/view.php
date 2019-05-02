<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataPreprosessing */
?>
<div class="data-preprosessing-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_data',
            'umur',
            'jenis_kelamin',
            'ras',
            'jenis_obat_1',
            'jenis_obat_2',
            'jenis_obat_3',
            'jenis_obat_4',
            'jenis_obat_5',
            'jenis_obat_6',
            'jenis_obat_7',
        ],
    ]) ?>

</div>
