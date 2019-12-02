<?php

use yii\helpers\Html;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
        
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],
        [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_cluster',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jumlah_cluster',
        
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],
    
    [

        'class' => 'kartik\grid\ActionColumn',

        'template' => '{detail}' ,

        'hAlign' => 'center',

        'width' => '10%',

        'buttons' => [            
            
            'detail' => function ($url,$model) {
                return Html::a('<span class="btn btn-info" >Detail</span>', Url::toRoute(['cluster-detail/detail','id' => $model->id_cluster]), ['title' => 'Lihat & Update Data Nilai Mahasiswa']);
            }, 
            
        ],
    ],

];   