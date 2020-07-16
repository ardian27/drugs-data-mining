<?php
// require_once __DIR__.'/vendor/autoload.php';

use app\models\DataTransformasi;
use Phpml\Clustering\KMeans;
/* @var $this yii\web\View */

$this->title = 'Drugs Mining';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>DRUGS MINING</h2>
    </div>

    <div class="body-content">

    <?php
$kmean = new KMeans(2);

$sample=[[1,21,22],[2,10,23],[1,11,29],[2,4,99],[1,21,21],[2,10,22],[1,11,32],[2,4,12],[1,21,22],[2,10,23],[1,11,29],[2,4,99],[1,21,21],[2,10,22],[1,11,32],[2,4,12]];
$dataDB = DataTransformasi::find()->select('umur,jenis_kelamin,ras,jenis_obat_1,jenis_obat_2,jenis_obat_3,jenis_obat_4,jenis_obat_5,jenis_obat_6,jenis_obat_7')->asArray()->all();
$result = array_map('array_values', $dataDB);
$samples = [[1, 1], [8, 7], [1, 2], [7, 8], [2, 1], [8, 9]];

$kmeans = new KMeans(5);
// $kmeans = new KMeans(5,5);
$r=$kmeans->cluster($result);

// print("<p>Data Dummy <pre> " . print_r(sizeOf($r[0]), true) . "</pre> "); 
// print("<p>Data Dummy <pre> " . print_r(sizeOf($r[1]), true) . "</pre> "); 
// print("<p>Data Dummy <pre> " . print_r(sizeOf($r[2]), true) . "</pre> "); 
// print("<p>Data Dummy <pre> " . print_r(sizeOf($r[3]), true) . "</pre> "); 
// print("<p>Data Dummy <pre> " . print_r(sizeOf($r[4]), true) . "</pre> "); 

// print("<p>Data Dummy <pre> " . print_r(sizeOf($r), true) . "</pre> "); 

// print("<p>Data Dummy <pre> " . print_r($result, true) . "</pre> "); 
print("<p>Data Dummy <pre> " . print_r($r, true) . "</pre> "); 


?>
        <div class="jumbotron">
            <div class="col-lg-12 center">
            <img src="img/uin.jpg"height="100" width="100">
                <h2>HIJRIYAH</h2>
                <h4>11351202604</h4>
                <h4>Teknik Informatika</h4>
                <h4>UIN Suska Riau</h4>                
            </div>
        </div>



    </div>
</div>
