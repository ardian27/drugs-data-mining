<pre>
TES
</pre>
<?php


$data = array(
    // array(0.5,  1, 0,                   0.333333333333333,  0.5,                5,                  1, 2, 3,4),

    array(0.5,  1, 0,                   0.333333333333333,  0.5,                0,                  0, 0, 0, 0),
    array(0.5,  1, 0.142857142857143,   0.666666666666667,  0.666666666666667,  0.5,                0, 0, 0, 0),
    array(0.75, 1, 0,                   0.333333333333333,  0,                  0,                  0, 0, 0, 0),
    array(0.5,  1, 0,                   0.666666666666667,  0.5,                0,                  0, 0, 0, 0),
    array(0.5,  1, 0,                   0.666666666666667,  0.5,                0.333333333333333,  0, 0, 0, 0),
    array(0.5,  0, 0,                   0,                  0.333333333333333,  0,                  0, 0, 0, 0),
    //
    array(0.5,  1, 0,                   0.534,  0.5,                0,                  0, 0, 0, 0),
    array(0.5,  1, 0,                   0.234,  0.5,                0.34,  0, 0, 0, 0),
    // array(0.5,  0, 0,                   0,                  0.333333333333333,  0,                  0, 0, 0, 0),
);

$jumlah_cluster = 5;

print("<p><pre><h4>Matrix  Data <h4> </pre> ");
print("<p><pre> " . print_r($data, true) . "</pre> ");
// print("<p><pre> " . print_r(cekNilaiTerkecil($data[0]), true) . "</pre> ");

(start($jumlah_cluster, $data));




function start($cluster, $data)
{

    print("<p><pre><h4>Perhitungan <h4> </pre> ");

    $data_cluster = setDataCluster($cluster, $data);
    print("<p>Data Cluster <pre> " . print_r($data_cluster, true) . "</pre></p> ");


    $jarak_data = hitungJarakData($data_cluster, $data, $cluster);
    print("<p>Data Jarak <pre> " . print_r($jarak_data, true) . "</pre></p> ");

    $hasil_cek_jarak_terpendek = hitungJarakTerpendek($jarak_data, $data, $cluster);
    print("<p>Data hasil cek jarak terpendek <pre> " . print_r($hasil_cek_jarak_terpendek, true) . "</pre></p> ");

    $hasil_nilai_mean = hitungNilaiMean($hasil_cek_jarak_terpendek, $data, $cluster);
    print("<p>Data hasil sum hasil_cek_jarak_terpendek <pre> " . print_r($hasil_nilai_mean, true) . "</pre></p> ");
    
    $data_centroid_baru=array();
    for ($a = 0; $a < $cluster; $a++) {
        $data_centroid_baru[$a] = hitungDataClusterBaru($hasil_cek_jarak_terpendek, $data, $a);
    }

    // // Hasil Nilai CLuster 1 Baru 
    // $hasil_data_baruC1 = hitungDataClusterBaru($hasil_cek_jarak_terpendek, $data, 0);
    // print("<p>Data hasil sum hasil_data_baruC1 <pre> " . print_r($hasil_data_baruC1, true) . "</pre></p> ");

    // // Hasil Nilai CLuster 2 Baru 
    // $hasil_data_baruC2 = hitungDataClusterBaru($hasil_cek_jarak_terpendek, $data, 1);
    // print("<p>Data hasil sum hasil_data_baruC2 <pre> " . print_r($hasil_data_baruC2, true) . "</pre></p> ");

    // // Hasil Nilai CLuster 3 Baru 
    // $hasil_data_baruC3 = hitungDataClusterBaru($hasil_cek_jarak_terpendek, $data, 2);
    // print("<p>Data hasil sum hasil_data_baruC1 <pre> " . print_r($hasil_data_baruC3, true) . "</pre></p> ");

    // // Hasil Nilai CLuster 4 Baru 
    // $hasil_data_baruC4 = hitungDataClusterBaru($hasil_cek_jarak_terpendek, $data, 3);
    // print("<p>Data hasil sum hasil_data_baruC2 <pre> " . print_r($hasil_data_baruC4, true) . "</pre></p> ");

    // // Hasil Nilai CLuster 5 Baru 
    // $hasil_data_baruC5 = hitungDataClusterBaru($hasil_cek_jarak_terpendek, $data, 4);
    // print("<p>Data hasil sum hasil_data_baruC2 <pre> " . print_r($hasil_data_baruC5, true) . "</pre></p> ");

    // $cluster_baru = array($hasil_data_baruC1, $hasil_data_baruC2, $hasil_data_baruC3, $hasil_data_baruC4, $hasil_data_baruC5);
    print("<p>Data hasil data cluster baru <pre> " . print_r($data_centroid_baru, true) . "</pre></p> ");




    return null;
}

function hitungSumBagiMean($hasilDataCentroidBaru)
{
    foreach($hasilDataCentroidBaru as $key=>$row){
        $i=$key;
        foreach($row as $key=>$rows){

        }
    }

return null;
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

function hitungNilaiMean($hasilcekjarakterpendek, $data, $jumlahcluster)
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
