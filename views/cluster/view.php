<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cluster */
?>
<div class="cluster-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cluster',
            'jumlah_cluster',
        ],
    ]) ?>

</div>
