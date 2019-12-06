<?php

use app\models\ClusterDetail;
use dosamigos\chartjs\ChartJs;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClusterDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Data Cluster ';
$this->params['breadcrumbs'][] = $this->title;

?>


<?php

$jumlah_cluster = $data;
// echo $jumlah_cluster;
// print("<p>Data Sum1 <pre> =>" . print_r($jumlah_cluster, true) . "</pre></p> ");


CrudAsset::register($this);


?>

<div class="cluster-detail-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Detail Data Cluster  ',
                // 'after'=>BulkButtonWidget::widget([
                //             'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                //                 ["bulk-delete"] ,
                //                 [
                //                     "class"=>"btn btn-danger btn-xs",
                //                     'role'=>'modal-remote-bulk',
                //                     'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                //                     'data-request-method'=>'post',
                //                     'data-confirm-title'=>'Are you sure?',
                //                     'data-confirm-message'=>'Are you sure want to delete this item'
                //                 ]),
                //         ]).                        
                //         '<div class="clearfix"></div>',
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); 
    $jumlah_data = ClusterDetail::find()->where(['id_cluster'=>$id])->count();

?>



<div class="div">
    <div class="row col-lg-3">Jumlah Cluster</div>
    <div class="row col-lg-3">: <?php echo  $cluster; ?></div> 
    <div class="row col-lg-3">Jumlah Data</div>
    <div class="row col-lg-3">: <?= $jumlah_data ?></div>

    <?php
    $data_detail = array();
    // $data_detail[0]=ClusterDetail::find()->where(['anggota_cluster'=>1])->count();
    // print("<p>Data Sum1 <pre> =>" . print_r($data_detail[0], true) . "</pre></p> ");

    for ($i = 0; $i < $cluster; $i++) {
        $data_detail[$i] = ClusterDetail::find()->where(['anggota_cluster' => $i + 1,'id_cluster'=>$id])->count();
        ?>
        <div class="row col-lg-3">Jumlah Anggota Cluster <?= $i + 1 ?></div>
        <div class="row col-lg-3">: <?= $data_detail[$i] ?></div>

    <?php
    }
    ?>
</div>