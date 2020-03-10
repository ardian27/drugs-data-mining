<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataPreprosessingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Preprosessing';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?> 
<div class="breadcrumb">

        <h3>Data Preprosessing Berhasil Dilakukan</h1>
        <p>4 Data kosong telah dihapus</p>
      </div>

<div class="data-preprosessing-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
               
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Data Preprosessing',
                'before'=>'',
                                      
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
