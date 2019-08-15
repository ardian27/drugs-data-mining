<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'vAlign'=>'middle',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tgl_kematian',
        'vAlign'=>'middle',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'waktu_kematian',
        'vAlign'=>'middle',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'penyebab_kematian',
        'vAlign'=>'middle',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'umur',
        'vAlign'=>'middle',
        'hAlign'=>'center',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_kelamin',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ras',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_1',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_2',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_3',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_4',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_5',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_6',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'jenis_obat_7',
         'vAlign'=>'middle',
         'hAlign'=>'center',
     ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => true,
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