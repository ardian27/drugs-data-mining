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

// 1. TENTUKAN JUMLAH CLUSTER
$cluster=5;

// HITUNG JARAK ANTARA CENTROID DENGAN EUCLID

// SET DATA CENTROID
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

$c_umur=convertNumArray($dataAwalUmur,'umur');
$c_jk=convertNumArray($dataAwalJk,'jenis_kelamin');
$c_ras=convertNumArray($dataAwalRas,'ras');
$c_j1=convertNumArray($dataAwalJ1,'jenis_obat_1'); 
$c_j2=convertNumArray($dataAwalJ2,'jenis_obat_2'); 
$c_j3=convertNumArray($dataAwalJ3,'jenis_obat_3'); 
$c_j4=convertNumArray($dataAwalJ4,'jenis_obat_4'); 
$c_j5=convertNumArray($dataAwalJ5,'jenis_obat_5'); 
$c_j6=convertNumArray($dataAwalJ6,'jenis_obat_6'); 
$c_j7=convertNumArray($dataAwalJ7,'jenis_obat_7'); 

$data_centroid=array([$c_umur,$c_jk]);


// print_r($c_umur);
// print_r($c_jk);
print_r($data_centroid);

foreach($c_umur as $result) {
    echo $result['umur'], '<br>';
}


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


$t_umur=convertNumArray($umur,'umur');
$t_jk=convertNumArray($jk,'jenis_kelamin');
$t_ras=convertNumArray($ras,'ras');
$t_j1=convertNumArray($j1,'jenis_obat_1'); 
$t_j2=convertNumArray($j2,'jenis_obat_2'); 
$t_j3=convertNumArray($j3,'jenis_obat_3'); 
$t_j4=convertNumArray($j4,'jenis_obat_4'); 
$t_j5=convertNumArray($j5,'jenis_obat_5'); 
$t_j6=convertNumArray($j6,'jenis_obat_6'); 
$t_j7=convertNumArray($j7,'jenis_obat_7'); 

// $t= $dataAwalUmur[0]['umur'];

// //cek jumlah size array
// echo sizeof($umur);
// echo sizeof($jk);
// echo sizeof($j1);
// echo sizeof($j2);
// echo sizeof($j3);
// echo sizeof($j4);
// echo sizeof($j5);
// echo sizeof($j6);
// echo sizeof($j7);

$aa=[1,1];
$bb=[1,1];

$singleArray = array();
$singleArrayy = array();
$eucUmur = array();

    foreach ($umur as $key => $value){
        $singleArray[$key] = $value['umur'];
    }

    
    foreach ($dataAwalUmur as $key => $value){
        $singleArrayy[$key] = $value['umur'];
    }

    // print_r($singleArray);
    // print_r($singleArrayy);

$tes=eucDistance($aa,$bb);
print_r(round($tes,5));


foreach ($umur as $key => $value){
    $singleArrayy[$key] = $value['umur'];
}
$new=convertNumArray($dataAwalUmur,'umur');


    


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

function convertNumArray($array_multi,$v){
    $newarray=array();
    foreach ($array_multi as $key => $value){
        $newarray[$key] = $value[$v];
    }
    return $newarray;
}

function setNewCentroid($array_centroid_baru){
    return $array_centroid_baru;
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


function setDataCentroid($cluster){

    $dataAwal = DataTransformasi::find()
    ->select('umur','jenis_kelamin','ras','jenis_obat_1','jenis_obat_2','jenis_obat_3','jenis_obat_4','jenis_obat_5','jenis_obat_6','jenis_obat_7')
    ->asArray()
    // ->limit($cluster)
    ->all(); 
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


function array_values_recursive( $array ) {
    $array = array_values( $array );
    for ( $i = 0, $n = count( $array ); $i < $n; $i++ ) {
        $element = $array[$i];
        if ( is_array( $element ) ) {
            $array[$i] = array_values_recursive( $element );
        }
    }
    return $array;
}



?>


