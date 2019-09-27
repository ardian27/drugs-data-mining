<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Variable */
?>
<div class="variable-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cluster',
            'status',
        ],
    ]) ?>

</div>
