<?php
use app\models\DataTransformasi;

/* @var $this yii\web\View */
?>
<h1>clusterring/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>


<div>

<?php 

// JUMLAH CLUSTER
$cluster=5;

// DATA AWAL CENTROID
$dataAwalUmur = DataTransformasi::find()->select('umur')->asArray()->limit($cluster)->all();
$dataAwalJk = DataTransformasi::find()->select('jenis_kelamin')->asArray()->limit($cluster)->all();
$dataAwalRas = DataTransformasi::find()->select('ras')->asArray()->limit($cluster)->all();
$dataAwalJ1 = DataTransformasi::find()->select('jenis_obat_1')->asArray()->limit($cluster)->all();
$dataAwalJ2 = DataTransformasi::find()->select('jenis_obat_2')->asArray()->limit($cluster)->all();
$dataAwalJ3 = DataTransformasi::find()->select('jenis_obat_3')->asArray()->limit($cluster)->all();
$dataAwalJ4 = DataTransformasi::find()->select('jenis_obat_4')->asArray()->limit($cluster)->all();
$dataAwalJ5 = DataTransformasi::find()->select('jenis_obat_5')->asArray()->limit($cluster)->all();
$dataAwalJ6 = DataTransformasi::find()->select('jenis_obat_6')->asArray()->limit($cluster)->all();
$dataAwalJ7 = DataTransformasi::find()->select('jenis_obat_7')->asArray()->limit($cluster)->all();

// DATA TRANSFORMATION
$umur = DataTransformasi::find()->select('umur')->asArray()->all();
$jk = DataTransformasi::find()->select('jenis_kelamin')->asArray()->all();
$ras = DataTransformasi::find()->select('ras')->asArray()->all();
$j1 = DataTransformasi::find()->select('jenis_obat_1')->asArray()->all();
$j2 = DataTransformasi::find()->select('jenis_obat_2')->asArray()->all();
$j3 = DataTransformasi::find()->select('jenis_obat_3')->asArray()->all();
$j4 = DataTransformasi::find()->select('jenis_obat_4')->asArray()->all();
$j5 = DataTransformasi::find()->select('jenis_obat_5')->asArray()->all();
$j6 = DataTransformasi::find()->select('jenis_obat_6')->asArray()->all();
$j7 = DataTransformasi::find()->select('jenis_obat_7')->asArray()->all();



function eucDistance(array $a, array $b) {
    return
    array_sum(
        array_map(
            function($x, $y) {
                return abs($x - $y) ** 2;
            }, $a, $b
        )
    ) ** (1/2);
}
// now use it with any array
// make sure both arrays have the same number of elements
// echo eucDistance([dataAwal,2,5,6,4.6], [4,6,33,45,2.5]);

//$dataCentroid = setDataCentroid($cs);

// function allEuc(array $centroid , array $data , array $c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10){

//     for($a=0; a<$data.length; $a++){
//         for($a=0; a<$data.length; $a++){
    
//         $hasil[$a]=eucDistance(
//             [
//                 $c1[1],$c2[1],$c3[1],$c4[1],$c5[1],$c6[1],$c7[1],$c8[1],$c9[1],$c10[1]
//             ],
//             [
//                 $d1[1],$d2[1],$d[1],$d4[1],$5[1],$c6[1],$c7[1],$c8[1],$c9[1],$c10[1]
//             ]);
    
//         }
//     }

// }




// echo print_r($dataCentroid);
 print_r($dataAwalUmur);


function setDataCentroid($cluster){

    $dataAwal = DataTransformasi::find()->select('umur','jenis_kelamin','ras','jenis_obat_1','jenis_obat_2','jenis_obat_3','jenis_obat_4','jenis_obat_5','jenis_obat_6','jenis_obat_7')->asArray()->limit(50)->all();
    
    
    return $dataAwal;
}


function euclid($cluster){

    // $akar 

    return null;
}

function printArray($array){
    foreach($array as $item) {
        echo $item['umur'];
    }


    return null;
}


?>


</div>