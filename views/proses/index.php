<?php
use app\models\DataAwal;
use yii\data\ActiveDataProvider;
use app\models\DataPreprosessing;
use app\models\DataSeleksi;
use app\models\DataTransformasi;

/* @var $this yii\web\View */
?>
<h1></h1>

<p>
    <!-- <code><?= __FILE__; ?></code>. -->
</p>

<?php

// Data Awal Sebelum Preprosessing
$query = DataAwal::find();               
$dataawal = new ActiveDataProvider([
'query' => $query,
'pagination' => [
    'pageSize' => 50,
],

]);

$DataAwal = $this->render('//data-awal/index', [
    'dataProvider' => $dataawal,
]);



// Data Preprosessing
$query = DataPreprosessing::find();               
$datapreprosessing = new ActiveDataProvider([
'query' => $query,
'pagination' => [
    'pageSize' => 50,
],

]);

$DataPreprosessing = $this->render('//data-preprosessing/index', [
    'dataProvider' => $datapreprosessing,
]);

// Data Selection
$query = DataSeleksi::find();               
$dataseleksi = new ActiveDataProvider([
'query' => $query,
'pagination' => [
    'pageSize' => 50,
],
]);

$DataSeleksi = $this->render('//data-seleksi/index', [
    'dataProvider' => $dataseleksi,
]);



// Data Transformasi
$query = DataTransformasi::find();               
$datatransformasi = new ActiveDataProvider([
'query' => $query,
'pagination' => [
    'pageSize' => 50,
],

]);

$DataTransformasi = $this->render('//data-transformasi/index', [
    'dataProvider' => $datatransformasi,
]);



$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        2 => [
            'title' => 'Data Awal',
            'icon' => 'glyphicon glyphicon-cloud-download',
            'buttons' => [
                'next' => [
                    'title' => 'Proses Data Seleksi', 
                    'options' => [
                        // 'class' => 'disabled'
                    ],
                ],
            ],
            'content' => ''.$DataAwal,

        ],
        3 => [
            'title' => 'Data Seleksi',
            'icon' => 'glyphicon glyphicon-cloud-download',
            'content' => ''.$DataSeleksi,
            'buttons' => [
                'next' => [
                    'title' => 'Proses Data Preprosessing', 
                    'options' => [
                        //'class' => 'disabled'
                    ],
                ],
            ],
            
        ],
        
        4 => [
            'title' => 'Data Preprosessing',
            'icon' => 'glyphicon glyphicon-cloud-download',
            'content' => ''.$DataPreprosessing,
            'buttons' => [
                'next' => [
                    'title' => 'Proses Data Transformasi', 
                    'options' => [
                        //'class' => 'disabled'
                    ],
                ],
            ],
        ],

        
        5 => [
            'title' => 'Data Transformasi',
            'icon' => 'glyphicon glyphicon-cloud-download',
            'content' => ''.$DataTransformasi,
            'buttons' => [
                'next' => [
                    'title' => 'Transformasi', 
                    'options' => [
                        //'class' => 'disabled'
                    ],
                ],
            ],
        ],
        // 2 => [
        //     'title' => 'Data Preprosesing',
        //     'icon' => 'glyphicon glyphicon-cloud-upload',
        //     'content' => '<h3>Step 2</h3>This is step 2',
        //     'skippable' => true,
        // ],
        // 3 => [
        //     'title' => 'Step 3',
        //     'icon' => 'glyphicon glyphicon-transfer',
        //     'content' => '<h3>Step 3</h3>This is step 3',
        // ],
    ],
    'complete_content' => "You are done!", // Optional final screen
    'start_step' => 2, // Optional, start with a specific step
];
?>

<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

</div>
