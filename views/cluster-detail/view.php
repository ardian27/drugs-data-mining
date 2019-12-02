<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClusterDetail */
?>
<div class="cluster-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cluster_detail',
            'id_cluster',
            'id_data',
            'x1',
            'x2',
            'x3',
            'x4',
            'x5',
            'x6',
            'x7',
            'x8',
            'x9',
            'x10',
        ],
    ]) ?>

</div>
