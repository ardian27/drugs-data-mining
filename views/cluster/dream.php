<?php

use app\models\DataTransformasi;
use app\models\Variable;
use dosamigos\chartjs\ChartJs;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */

// 1. TENTUKAN JUMLAH CLUSTER
// $k = Variable::findOne(['status' => 'Active']);
$k = Variable::findOne(['status' => 'Active']);

$cluster = sizeOf($clustered_data);
// $cluster = $k['cluster'];
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>



<div>

    <?php

    // echo $data->cluster;

    // HITUNG JARAK ANTARA CENTROID DENGAN EUCLID

    // SET DATA CENTROID

    ?>
    <br>
    <br>
    <br>



    <?php


    $label = array();
    $color = array();
    $datahasilmining = array();

    switch ($cluster) {
        case 2:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $label =  ["C1", "C2"];
            $color =  ['#512c62', '#c93838'];
            $datahasilmining =  [$x1, $x2];
            break;
        case 3:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $label =  ["C1", "C2", "C3"];
            $color =  ['#512c62', '#c93838', '#f75f00'];
            $datahasilmining =  [$x1, $x2, $x3];
            break;
        case 4:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $x4 = sizeOf($clustered_data[3]);
            $datahasilmining =  [$x1, $x2, $x3, $x4];
            $label =  ["C1", "C2", "C3", "C4"];
            $color =  ['#512c62', '#c93838', '#f75f00', '#43ab92'];
            break;
        case 5:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $x4 = sizeOf($clustered_data[3]);
            $x5 = sizeOf($clustered_data[4]);
            $datahasilmining =  [$x1, $x2, $x3, $x4, $x5];
            $label =  ["C1", "C2", "C3", "C4", "C5"];
            $color =  ['#512c62', '#c93838', '#f75f00', '#43ab92', '#ffaac3'];
            break;
        case 6:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $x4 = sizeOf($clustered_data[3]);
            $x5 = sizeOf($clustered_data[4]);
            $x6 = sizeOf($clustered_data[5]);
            $datahasilmining =  [$x1, $x2, $x3, $x4, $x5, $x6];
            $label =  ["C1", "C2", "C3", "C4", "C5", "C6"];
            $color =  ['#512c62', '#c93838', '#f75f00', '#43ab92', '#ffaac3', '#b063c5'];
            break;
        case 7:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $x4 = sizeOf($clustered_data[3]);
            $x5 = sizeOf($clustered_data[4]);
            $x6 = sizeOf($clustered_data[5]);
            $x7 = sizeOf($clustered_data[6]);
            $datahasilmining =  [$x1, $x2, $x3, $x4, $x5, $x6, $x7];
            $label =  ["C1", "C2", "C3", "C4", "C5", "C6", "C7"];
            $color =  ['#512c62', '#c93838', '#f75f00', '#43ab92', '#ffaac3', '#b063c5', '#505bda'];
            break;
        case 8:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $x4 = sizeOf($clustered_data[3]);
            $x5 = sizeOf($clustered_data[4]);
            $x6 = sizeOf($clustered_data[5]);
            $x7 = sizeOf($clustered_data[6]);
            $x8 = sizeOf($clustered_data[7]);
            $datahasilmining =  [$x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8];
            $label =  ["C1", "C2", "C3", "C4", "C5", "C6", "C7", "C8"];
            $color =  ['#512c62', '#c93838', '#f75f00', '#43ab92', '#ffaac3', '#b063c5', '#505bda', '#1a2849'];
            break;
        case 9:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $x4 = sizeOf($clustered_data[3]);
            $x5 = sizeOf($clustered_data[4]);
            $x6 = sizeOf($clustered_data[5]);
            $x7 = sizeOf($clustered_data[6]);
            $x8 = sizeOf($clustered_data[7]);
            $x9 = sizeOf($clustered_data[8]);
            $datahasilmining =  [$x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9];
            $label =  ["C1", "C2", "C3", "C4", "C5", "C6", "C7", "C8", "C9"];
            $color =  ['#512c62', '#c93838', '#f75f00', '#43ab92', '#ffaac3', '#b063c5', '#505bda', '#1a2849', '#3b064d'];
            break;
        case 10:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $x4 = sizeOf($clustered_data[3]);
            $x5 = sizeOf($clustered_data[4]);
            $x6 = sizeOf($clustered_data[5]);
            $x7 = sizeOf($clustered_data[6]);
            $x8 = sizeOf($clustered_data[7]);
            $x9 = sizeOf($clustered_data[8]);
            $x10 = sizeOf($clustered_data[9]);
            $datahasilmining =  [$x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10];
            $label =  ["C1", "C2", "C3", "C4", "C5", "C6", "C7", "C8", "C9", "C10"];
            $color =  ['#512c62', '#c93838', '#f75f00', '#43ab92', '#ffaac3', '#b063c5', '#505bda', '#1a2849', '#3b064d', '#3b021d'];
            break;
        default:
            $x1 = sizeOf($clustered_data[0]);
            $x2 = sizeOf($clustered_data[1]);
            $x3 = sizeOf($clustered_data[2]);
            $x4 = sizeOf($clustered_data[3]);
            $datahasilmining =  [$x1, $x2, $x3, $x4];
            $label =  ["C1", "C2", "C3", "C4"];
            $color =  ['#512c62', '#c93838', '#f75f00', '#43ab92'];
    }
    ?>
        <!-- Chart Pie -->
        <div class="row">
            <div class="col-lg-6">
                <?= ChartJs::widget([
                    'type' => 'pie',
                    'options' => [
                        'height' => 20,
                        'width' => 20,
                    ],
                    'data' => [

                        'labels' => $label,
                        'datasets' => [
                            [
                                'data' => $datahasilmining, // Your dataset
                                'label' => "Drugs Mining",
                                'backgroundColor' => $color,
                                'borderColor' =>  [
                                    '#fff',
                                    '#fff',

                                ],
                                'borderWidth' => 5,
                                'hoverBorderColor' => ["#999", "#999"],
                            ],
                        ],
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-6">

                <pre>Jumlah Cluster = <?php echo $cluster; ?></pre>

            </div>
        </div>
        <br>

        <br>

        <?php

        $simpan = array();

       

        foreach ($clustered_data as $key => $cd) {
            $x = $key;

            ?>

            <br>
            <br>
            <br>
            <div class="jumbotron">
                <h1>Data Cluster <?php echo $x + 1; ?></h1>
            </div>
            <table style="width: 100%; text-align: center;" border="1">
                <tbody>
                    <tr>

                        <td>No.</td>
                        <td>X1</td>
                        <td>X2</td>
                        <td>X3</td>
                        <td>X4</td>
                        <td>X5</td>
                        <td>X6</td>
                        <td>X7</td>
                        <td>X8</td>
                        <td>X9</td>
                        <td>X10</td>
                    </tr>
                    <?php
                        $y = 0;
                        foreach ($cd as $key => $data) {
                            
                            ?>

                        <tr>
                            <td><?php echo $key + 1; ?></td>

                            <?php
                                    $lengths = count($clustered_data[$x][0]);
                                    $length = count($clustered_data[0][0]);
                                    // echo $length;
                                    for ($i = 0; $i < $length; $i++) {
                                        # code...
                                        $value = max($data);
                                        if ($data[$i] == $value) {
                                            // if($data[i]){
                                                // $simpan[] = [null, $key, $data[$i],$data[$i],];
                                                // Yii::$app->db
                                                //     ->createCommand()
                                                //     ->batchInsert('cluster_detail', ['id_cluster_detail', 'id_cluster', 'x1','x2','x3','x4','x5','x6','x7','x8','x9','x10'], $simpan)
                                                //     ->execute();
                                            // echo $value;
                                            // }    
                                        }
                                        // $color1 = $data[$i] > $data[8][$i] ? 'green'  : 'white';
                                        // $color2 = $data[$i] < $data[8][$i] ? 'grey'  : 'white';
                                        ?>
                                <td><?php echo $data[$i] ?></td>


                            <?php
                                    }
                                    ?>
                        </tr>
                    <?php
                        }
                        ?>

                </tbody>
            </table>
        <?php
            $x++;
        }

        $nilai = DataTransformasi::find()
            ->select('id_data,umur,jenis_kelamin,ras,jenis_obat_1,jenis_obat_2,jenis_obat_3,jenis_obat_4,jenis_obat_5,jenis_obat_6,jenis_obat_7')
            ->asArray()
            ->all();

        $result = array();
        $resultss = array();
        $a = 0;
        // print("<pre> " . print_r($clustered_data, true) . "</pre>");


        ?>
        <BR>
        <BR>
        <?php

        $x1 = array();
        $x2 = array();
        $x3 = array();
        $x4 = array();
        $x5 = array();
        $x6 = array();
        $x7 = array();
        $x8 = array();
        $x9 = array();
        $x10 = array();
        $a = 0;
        $b = 0;



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

        function convertNumArray($array_multi, $v)
        {
            $newarray = array();
            foreach ($array_multi as $key => $value) {
                $newarray[$key] = $value[$v];
            }
            return $newarray;
        }

        function setNewCentroid($array_centroid_baru)
        {
            return $array_centroid_baru;
        }





        ?>