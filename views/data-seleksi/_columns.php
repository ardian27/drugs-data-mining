<?php
use yii\helpers\Url;

return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'umur',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jenis_kelamin',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ras',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jenis_obat_1',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_2',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_3',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_4',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_5',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_6',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_7',
     ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false, 
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   