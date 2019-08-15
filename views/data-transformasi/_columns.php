<?php
use yii\helpers\Url;

return [
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'umur',
        'vAlign'=>'middle',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'hAlign'=>'center',
        'attribute'=>'jenis_kelamin',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'attribute'=>'ras',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'attribute'=>'jenis_obat_1',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'attribute'=>'jenis_obat_2',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'attribute'=>'jenis_obat_3',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'attribute'=>'jenis_obat_4',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'attribute'=>'jenis_obat_5',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'attribute'=>'jenis_obat_6',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'attribute'=>'jenis_obat_7',
    ],
    // [
    //     'class' => 'kartik\grid\ActionColumn',
    //     'dropdown' => true,
    //     'vAlign'=>'middle',
    //     'urlCreator' => function($action, $model, $key, $index) { 
    //             return Url::to([$action,'id'=>$key]);
    //     },
    //     'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
    //     'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
    //     'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
    //                       'data-confirm'=>false, 'data-method'=>false, //for overide yii data api
    //                       'data-request-method'=>'post',
    //                       'data-toggle'=>'tooltip',
    //                       'data-confirm-title'=>'Are you sure?',
    //                       'data-confirm-message'=>'Are you sure want to delete this item'], 
    // ],

];   