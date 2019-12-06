 
<?php

use app\models\Cluster;
use app\models\DataTransformasi;


//Data Dummy
$data = array(
    array(0.5,  1, 0,                   0.333333333333333,  0.5,                0,                  0, 0, 0, 0),
    array(0.5,  1, 0.142857142857143,   0.666666666666667,  0.666666666666667,  0.5,                0, 0, 0, 0),
    array(0.75, 1, 0,                   0.333333333333333,  0,                  0,                  0, 0, 0, 0),
    array(0.5,  1, 0,                   0.666666666666667,  0.5,                0,                  0, 0, 0, 0),
    array(0.5,  1, 0,                   0.666666666666667,  0.5,                0.333333333333333,  0, 0, 0, 0),
    array(0.5,  0, 0,                   0,                  0.333333333333333,  0,                  0, 0, 0, 0),
    array(0.5,  1, 0.142857142857143,   0.666666666666667,  0.666666666666667,  0.5,                0, 0, 0, 0),
    array(0.5,  1, 0,                   0.534,  0.5,                0,                  0, 0, 0, 0),
    array(0.5,  1, 0,                   0.234,  0.5,                0.34,  0, 0, 0, 0),
);

$dataDB = DataTransformasi::find()->select('umur,jenis_kelamin,ras,jenis_obat_1,jenis_obat_2,jenis_obat_3,jenis_obat_4,jenis_obat_5,jenis_obat_6,jenis_obat_7',)->asArray()->limit(100)->all();
// $dataDB = DataTransformasi::find()->select('umur,jenis_kelamin,ras,jenis_obat_1,jenis_obat_2,jenis_obat_3,jenis_obat_4,jenis_obat_5,jenis_obat_6,jenis_obat_7')->asArray()->all();
$result = array_map('array_values', $dataDB);
$T_result = transpose($result);

$final = array();
foreach ($result as $key => $rows) {
    $i = $key;
    foreach ($rows as $key => $row) {
        $final[$i][$key] = (int) $result[$i][$key];
    }
}
$cluster = Cluster::find()->select('jumlah_cluster')->orderBy(['id_cluster' => SORT_DESC])->one();


$jumlah_cluster = $cluster['jumlah_cluster'];

// print("<p><pre><h4>Matrix  Data <h4> </pre> ");
// print("<p>Data Dummy <pre> " . print_r($cluster['jumlah_cluster'], true) . "</pre> "); 
// print("<p>Data DB <pre> " . print_r($final, true) . "</pre> "); 

(start($jumlah_cluster, $final));




function start($cluster, $data)
{
    $max_iterasi = 1000000;


    print("<p><pre><h4>Perhitungan 0 <h4> </pre> ");

    $data_cluster_0 = setDataCluster($cluster, $data);
    // print("<p>Data Cluster <pre> " . print_r($data_cluster_0, true) . "</pre></p> ");


    $jarak_data_0 = hitungJarakData($data_cluster_0, $data, $cluster);
    // print("<p>Data Jarak <pre> " . print_r($jarak_data_0, true) . "</pre></p> ");

    $hasil_cek_jarak_terpendek_0 = hitungJarakTerpendek($jarak_data_0, $data, $cluster);
    // print("<p>Data hasil cek jarak terpendek <pre> " . print_r($hasil_cek_jarak_terpendek_0, true) . "</pre></p> ");

    $hasil_sum_nilai_1_0 = hitungNilaiSumNilai1($hasil_cek_jarak_terpendek_0, $data, $cluster);
    // print("<p>Data hasil sum hasil_cek_jarak_terpendek0 <pre> " . print_r($hasil_sum_nilai_1_0, true) . "</pre></p> ");

    $data_baru_0 = array();
    for ($a = 0; $a < $cluster; $a++) {
        $data_baru_0[$a] = hitungDataClusterBaru($hasil_cek_jarak_terpendek_0, $data, $a);
    }

    // print("<p>Data hasil data cluster baru <pre> " . print_r($data_baru_0, true) . "</pre></p> ");

    $hasil_bagi_0 = hitungSumBagiMean($data_baru_0, $hasil_sum_nilai_1_0);
    // print("<p>Data hasil sum bagi   <pre>  " . print_r($hasil_bagi_0, true) . "</pre></p> ");
    $data_cluster_baru[0] = $hasil_bagi_0;

    //====================
    // print("<p><pre><h4>Perhitungan 1 <h4> </pre> ");

    // $data_cluster_1 = setDataCluster($cluster, $data);
    // print("<p>Data Cluster <pre> " . print_r($data_cluster_1, true) . "</pre></p> ");


    $jarak_data_1 = hitungJarakData($data_cluster_baru[0], $data, $cluster);
    // print("<p>Data Jarak <pre> " . print_r($jarak_data_1, true) . "</pre></p> ");

    $hasil_cek_jarak_terpendek_1 = hitungJarakTerpendek($jarak_data_1, $data, $cluster);
    // print("<p>Data hasil cek jarak terpendek <pre> " . print_r($hasil_cek_jarak_terpendek_1, true) . "</pre></p> ");

    $hasil_sum_nilai_1_1 = hitungNilaiSumNilai1($hasil_cek_jarak_terpendek_1, $data, $cluster);
    // print("<p>Data hasil sum hasil_cek_jarak_terpendek0 <pre> " . print_r($hasil_sum_nilai_1_1, true) . "</pre></p> ");

    $data_baru_1 = array();
    for ($a = 0; $a < $cluster; $a++) {
        $data_baru_1[$a] = hitungDataClusterBaru($hasil_cek_jarak_terpendek_1, $data, $a);
    }

    // print("<p>Data hasil data cluster baru <pre> " . print_r($data_baru_1, true) . "</pre></p> ");

    $hasil_bagi_1 = hitungSumBagiMean($data_baru_0, $hasil_sum_nilai_1_1);
    // print("<p>Data hasil sum bagi   <pre>  " . print_r($hasil_bagi_0, true) . "</pre></p> ");


    $data_cluster_baru[1] = $hasil_bagi_1;
    // print("<p>Data cluster  pada iterasi ke " . 1 . "   <pre>  " . print_r($data_cluster_baru[0], true) . "</pre></p> ");
    // print("<p>Data cluster  pada iterasi ke " . 2 . "   <pre>  " . print_r($data_cluster_baru[1], true) . "</pre></p> ");

    // // ($data_cluster_baru[$i - 1] == $data_cluster_baru[$i]) or 
    for ($i = 2; $i < $max_iterasi; $i++) {


        $jarak_datas[$i] = hitungJarakData($data_cluster_baru[$i - 1], $data, $cluster);
        $hasil_cek_jarak_terpendeks[$i] = hitungJarakTerpendek($jarak_datas[$i], $data, $cluster);
        $hasil_sum_nilai_1s[$i] = hitungNilaiSumNilai1($hasil_cek_jarak_terpendeks[$i], $data, $cluster);

        $data_barus[$i] = array();
        for ($a = 0; $a < $cluster; $a++) {
            $data_barus[$i][$a] = hitungDataClusterBaru($hasil_cek_jarak_terpendeks[$i], $data, $a);
        }
        $hasil_bagis[$i] = hitungSumBagiMean($data_barus[$i], $hasil_sum_nilai_1s[$i]);
        $data_cluster_baru[$i] = $hasil_bagis[$i];
        // print("<p>Data cluster  pada iterasi ke " . ($i+1) . "   <pre>  " . print_r($data_cluster_baru[$i], true) . "</pre></p> ");


        if (($data_cluster_baru[$i - 1] == $data_cluster_baru[$i])) {
            // print("<p>Hasil Data Terbaik <pre> " . print_r($hasil_cek_jarak_terpendeks[$i], true) . "</pre> ");
            $id_cluster = Cluster::find()->max('id_cluster');


            // $a = array(
            //     array(2,2,0),
            //     array(1,2,3),
            //     array(2,2,0),
            // );
            
            
            $anggota_c=array();
            $hasil=$hasil_cek_jarak_terpendeks[$i];
            $jumlah_data=sizeof($hasil_cek_jarak_terpendeks[$i]);

            // $jumlah_data=sizeof($a);
            // echo "panjang".$jumlah_data;

            for($ii=0; $ii< $jumlah_data; $ii++){
                $anggota_c[$ii]= cekNilaiTerbesar($hasil[$ii])+1;
                // echo cekNilaiTerbesar($a[$ii]);
            }
              
            // print("<p>Data anggota_c     <pre>  " . print_r($anggota_c, true) . "</pre></p> ");
                
            // echo "panjang".sizeof($hasil_cek_jarak_terpendeks[$i])."";
            

            $datainsert = array();
         

            foreach ($hasil_cek_jarak_terpendeks[$i] as $key => $value) {
                $datainsert[] = [
                    'id_cluster' => $id_cluster,
                    'id_data' => $key + 1,
                    'anggota_cluster' => $anggota_c[$key],
                ];
            }

            if (count($datainsert) > 0) {
                $columnNameArray = ['id_cluster', 'id_data', 'anggota_cluster'];
                // below line insert all your record and return number of rows inserted
                $insertCount = Yii::$app->db->createCommand()
                    ->batchInsert(
                        'cluster_detail',
                        $columnNameArray,
                        $datainsert
                    )
                    ->execute();
            }
            $this->redirect(['user/index']);
            break;
        }
    }
}


function hitungSumBagiMean($hasilDataBaru, $hasilsum1)
{
    $hasil_sum = array();
    $hasil_bagi = array();
    // tes hitung data
    // $data = array(
    //     array(1, 0, 3, 4),
    //     array(1, 2, 3, 4),
    // );
    // $hasil = hitungSum($data);

    foreach ($hasilDataBaru as $key => $row) {
        $hasil_sum[$key] = hitungSum($row);
    }
    // cek data sum1 dan sum data
    // print("<p>Data Sum1 <pre> =>" . print_r($hasilsum1, true) . "</pre></p> ");
    // print("<p>Data Sum <pre> =>" . print_r($hasil_sum, true) . "</pre></p> ");

    $hasil_bagi = hitungBagi($hasil_sum, $hasilsum1);

    return $hasil_bagi;
}

function hitungBagi($data, $hasilsum1)
{

    $hasil = array();
    $sizeCluster = sizeOf($data);
    for ($i = 0; $i < $sizeCluster; $i++) {
        for ($j = 0; $j < sizeOf($data[0]); $j++) {
            $hasil[$i][$j] = $data[$i][$j] / $hasilsum1[$i];
        }
    }

    return $hasil;
}

function hitungSum($data)
{
    // di transpose agar mudah menjumlahkan nilai array column
    $T_data = transpose($data);
    // print("<p>Data Error <pre> =>" . print_r($T_data, true) . "</pre></p> ");

    $hasil = array();
    foreach ($T_data as $key => $row) {
        $i = $key;
        $hasil[$i] = 0;
        foreach ($row as $key => $rows) {
            $hasil[$i] = array_sum(array_column($row, $rows[$key]));
        }
    }
    return $hasil;
}

function hitungDataClusterBaru($hasil_cek_jarak_terpendek, $data, $value_cluster)
{
    // memasukkan data nilai sesuai dengan nilai 1 yang ada disetiap cluster
    $data_baru = array();

    foreach ($data as $key => $row) {
        $i = $key;
        foreach ($row as $key => $rows) {
            if ($hasil_cek_jarak_terpendek[$i][$value_cluster] == 1) {
                $data_baru[$i][$key] = $data[$i][$key];
            } else {
                $data_baru[$i][$key] = 0;
            }
        }
    }

    return $data_baru;
}

function hitungNilaiSumNilai1($hasilcekjarakterpendek, $data, $jumlahcluster)
{
    //fungsi menjumlahkan nilai angka 1 disetiap column cluster
    $sumJumlahNilai1 = array();
    $t = transpose($hasilcekjarakterpendek);
    for ($a = 0; $a < $jumlahcluster; $a++) {
        $sumJumlahNilai1[$a] = array_sum($t[$a]);
    }


    // foreach ($hasilcekjarakterpendek as $key => $row) { 
    //     if

    // }        

    // menghitung nilai cluster baru
    // $cluster_baru=array();

    // foreach ($hasilcekjarakterpendek as $key => $row) { 

    // }
    return $sumJumlahNilai1;
}

//fungsi menghitung jarak terpendek dengan euclidean
function hitungJarakTerpendek($data_jarak_data, $data, $jumlahcluster)
{
    $hasil_nol = array();
    $transpose_data_jarak_data = transpose($data_jarak_data);

    //fungsi mencari nilai terkecil dari hasil transpose data yang dihasilkan dari data jarak
    foreach ($transpose_data_jarak_data as $key => $tdj) {
        $i = $key;
        foreach ($tdj as $key => $data) {
            if ((cekNilaiTerkecil($transpose_data_jarak_data[$i])) == $key) {
                $hasil_nol[$i][$key] = 1;
            } else {
                $hasil_nol[$i][$key] = 0;
            }
        }
    }

    // print("<p>Data  hasil <pre>  ==" . print_r($hasil_nol, true) . "</pre></p> "); 

    return $hasil_nol;
}

function cekNilaiTerkecil($array)
{
    // $min=min(array_column($array, $row));
    $index = array_search(min($array), $array);
    return $index;
}

function cekNilaiTerbesar($array)
{
    // $min=min(array_column($array, $row));
    $index = array_search(max($array), $array);
    return $index;
}

// fungsi transpose
function transpose($array)
{
    array_unshift($array, null);
    return call_user_func_array('array_map', $array);
}


function cariIndexTerkecil($array, $min)
{
    return array_keys($array,  $min);
}

function cariIndex($array, $data_target)
{
    return array_keys($array,  $data_target);
}




//fungsi menghitung jarak  dengan euclidean
function hitungJarakData($datacluster, $targetdata, $jumlahcluster)
{
    $hasil_hitung_jarak = array();

    for ($a = 0; $a < $jumlahcluster; $a++) {
        foreach ($targetdata as $key => $row) {
            $hasil_hitung_jarak[$a][$key] = eucDistance($datacluster[$a], $targetdata[$key]);
        }
    }
    return $hasil_hitung_jarak;
}

//fungsi mengambil data cluster sesuai dengan jumlah cluster yang diinginkan
function setDataCluster($jumlah_cluster, $data)
{
    for ($i = 0; $i < $jumlah_cluster; $i++) {
        $cluster[$i] = $data[$i];
    }
    return $cluster;
}

//fungsi hitung jarak
// echo eucDistance($data[1], $data[5]);
function eucDistance(array $a, array $b)
{
    return
        array_sum(
            array_map(
                function ($x, $y) {
                    return abs($x - $y) ** 2;
                },
                $a,
                $b
            )
        ) ** (1 / 2);
}
