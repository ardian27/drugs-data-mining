<?php

use app\models\DataTransformasi;
use app\models\Variable;
use dosamigos\chartjs\ChartJs;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */

// 1. TENTUKAN JUMLAH CLUSTER
$k = Variable::findOne(['status' => 'Active']);

$cluster = $k['cluster'];

?>
<h1>clusterring/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>



<div>

    <?php


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
    $dataAll = DataTransformasi::find()->asArray()->limit($cluster)->all();

    $c_umur = convertNumArray($dataAwalUmur, 'umur');
    $c_jk = convertNumArray($dataAwalJk, 'jenis_kelamin');
    $c_ras = convertNumArray($dataAwalRas, 'ras');
    $c_j1 = convertNumArray($dataAwalJ1, 'jenis_obat_1');
    $c_j2 = convertNumArray($dataAwalJ2, 'jenis_obat_2');
    $c_j3 = convertNumArray($dataAwalJ3, 'jenis_obat_3');
    $c_j4 = convertNumArray($dataAwalJ4, 'jenis_obat_4');
    $c_j5 = convertNumArray($dataAwalJ5, 'jenis_obat_5');
    $c_j6 = convertNumArray($dataAwalJ6, 'jenis_obat_6');
    $c_j7 = convertNumArray($dataAwalJ7, 'jenis_obat_7');
    $c_dataAll = array_values($dataAll);



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


    $t_umur = convertNumArray($umur, 'umur');
    $t_jk = convertNumArray($jk, 'jenis_kelamin');
    $t_ras = convertNumArray($ras, 'ras');
    $t_j1 = convertNumArray($j1, 'jenis_obat_1');
    $t_j2 = convertNumArray($j2, 'jenis_obat_2');
    $t_j3 = convertNumArray($j3, 'jenis_obat_3');
    $t_j4 = convertNumArray($j4, 'jenis_obat_4');
    $t_j5 = convertNumArray($j5, 'jenis_obat_5');
    $t_j6 = convertNumArray($j6, 'jenis_obat_6');
    $t_j7 = convertNumArray($j7, 'jenis_obat_7');

    $array = $c_umur;


    $alldata = array();
    $a = 0;
    foreach ($t_umur as $data) {
        $alldata[$a] = [
            $t_umur[$a],
            $t_jk[$a],
            $t_ras[$a],
            $t_j1[$a],
            $t_j2[$a],
            $t_j3[$a],
            $t_j4[$a],
            $t_j5[$a],
            $t_j6[$a],
            $t_j7[$a]
        ];
        $a++;
    }
    ?>
    <br>
    <br>
    <br>



    <?php

    $kmeans = new Kmeans($alldata);
    $kmeans->cluster($cluster); // setting jumlah cluster

    $clustered_data = $kmeans->getClusteredData();

    // echo '<br>' . 'test count ' . count(current($clustered_data[0]));
    // echo '<br>' . 'test count size ' . sizeOf($clustered_data[0]);
    // echo '<br>' . 'test count ' . count(current($clustered_data[1]));
    // echo '<br>' . 'test count size ' . sizeOf($clustered_data[1]);
    // echo '<br>' . 'test count ' . count(current($clustered_data[2]));
    // echo '<br>' . 'test count size ' . sizeOf($clustered_data[2]);
    // echo '<br>' . 'test count ' . count(current($clustered_data[3]));
    // echo '<br>' . 'test count size ' . sizeOf($clustered_data[3]);
    // echo '<br>' . 'test count ' . count(current($clustered_data[4]));
    // echo '<br>' . 'test count size ' . sizeOf($clustered_data[4]);
    // echo '<br>'.'test count '.count(current($clustered_data[5]));
    // echo '<br>'.'test count size '.sizeOf($clustered_data[5]);
    // echo '<br>'.'test count '.count(current($clustered_data[6]));
    // echo '<br>'.'test count size '.sizeOf($clustered_data[7]);
    // echo '<br>'.'test count '.count(current($clustered_data[8]));
    // echo '<br>'.'test count size '.sizeOf($clustered_data[8]);
    // echo '<br>'.'test count '.count(current($clustered_data[9]));
    // echo '<br>'.'test count size '.sizeOf($clustered_data[9]); 



    echo '<br>' . '';

    $centroids = $kmeans->getCentroids();

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
            <div class="col-md-8">
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
        </div>
        <br>
        <table style="width: 100%; text-align: center;" border="1">
            <tbody>
                <tr>
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

                foreach ($clustered_data as $cd) {

                    ?>
                    <tr>
                        <td><?php print_r($cd['0']); ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <BR>
        <BR>
        <div class="row">
            <?= print("<pre>" . "" . print_r($clustered_data, true) . "</pre>"); ?>
        </div>

        <div class="row">
            <?= print("<pre>" . "" . print_r($centroids, true) . "</pre>"); ?>
        </div>
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

        foreach ($clustered_data as $cs) {
            // echo "".$cs[$a][$b];
            ?>
            <br>
        <?php
            $a++;
            $b++;
        }



        // $provider = new ArrayDataProvider([
        //     'allModels' => $clustered_data,
        //     'pagination' => [
        //         'pageSize' => 10,
        //     ],
        //     'sort' => [
        //         'attributes' => ['id', 'name'],
        //     ],
        // ]);

        // GridView::widget([
        //     'dataProvider' => $array,
        //     'columns' => [
        //         ['class' => 'yii\grid\SerialColumn'],
        //         'id',
        //         'name',        
        //         ['class' => 'yii\grid\ActionColumn',
        //         'contentOptions' => ['style' => 'width:84px; font-size:18px;']],
        //     ],
        // ]); 

        function countClusterData($datacentroid, $jumlahcluster)
        {
            // $count = array();

            $a = 0;
            foreach ($jumlahcluster as $j) {
                // $count = ?
            }
            return null;
        }


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


        function setDataCentroid($cluster)
        {

            $dataAwal = DataTransformasi::find()
                ->select('umur', 'jenis_kelamin', 'ras', 'jenis_obat_1', 'jenis_obat_2', 'jenis_obat_3', 'jenis_obat_4', 'jenis_obat_5', 'jenis_obat_6', 'jenis_obat_7')
                ->asArray()
                // ->limit($cluster)
                ->all();
            return $dataAwal;
        }




        function euclid($cluster)
        {

            // $akar 

            return null;
        }

        function printArray($array)
        {
            foreach ($array as $item) {
                echo $item['umur'];
            }
            return null;
        }


        function array_values_recursive($array)
        {
            $array = array_values($array);
            for ($i = 0, $n = count($array); $i < $n; $i++) {
                $element = $array[$i];
                if (is_array($element)) {
                    $array[$i] = array_values_recursive($element);
                }
            }
            return $array;
        }


        class KMeans
        {
            // initial, unmodified data field
            protected $data;
            // array of modified data, multi-dimensional based on cluster_count
            protected $clustered_data;
            // array of centroids based on cluster_count
            protected $centroids;
            // array of centroid distance, useful for testing different cluster_counts
            protected $centroid_distance;
            // acceptable methods for clustering
            protected static $ACCEPTED_CLUSTERING_METHODS = [
                'random',
                'forgy',
            ];
            /**
             * basic construct that accepts the initial list of observations
             * exception thrown if data is not large enough for clustering
             *
             * @param  $data  array  list of observations, each observation a same-length list of numeric values
             */
            public function __construct(array $data)
            {
                if (count($data) < 2) {
                    throw new Exception('Data Wajib Lebih Dari Satu Baris');
                }
                $this->data = $data;
            }

            public function cluster($cluster_count, $method = 'random')
            {
                if ($cluster_count < 2) {
                    throw new Exception('Cluster harus lebih dari 1');
                }
                if ($cluster_count > count($this->data)) {
                    throw new Exception('jumlah variable harus lebih besar dari cluster');
                }
                if (!in_array($method, self::$ACCEPTED_CLUSTERING_METHODS)) {
                    throw new Exception("Unrecognized method passed into cluster: {$method}");
                }
                do {
                    if (empty($centroids)) {
                        $centroids = $this->getInitialCentroids($cluster_count, $method);
                    } else {
                        $centroids = $this->calculateCentroids($this->clustered_data);
                    }
                    $new_clustered_data = array_fill(0, $cluster_count, []);
                    foreach ($this->data as $observation) {
                        $closest_centroid = $this->calculateClosestCentroid($observation, $centroids);
                        array_push($new_clustered_data[$closest_centroid], $observation);
                    }
                } while ($this->assignmentConvergenceCheck((array) $this->clustered_data, $new_clustered_data) === false);
                $this->centroids = $centroids;
                // todo calculate centroid distances
                return $this->getClusteredData();
            }
            /**
             * simple getter to fetch the centroids
             * will throw an exception if centroids have not been set yet
             *
             * @return  array  list of centroids
             */
            public function getCentroids()
            {
                if (empty($this->centroids)) {
                    throw new Exception('Kesalahan memulai algoritma');
                }
                return $this->centroids;
            }

            public function getClusteredData()
            {
                if (empty($this->clustered_data)) {
                    throw new Exception('Kesalahan memulai algoritma');
                }
                return $this->clustered_data;
            }
            /**
             * simple getter to fetch centroid distance
             * this number is helpful for determining cluster count for repeat runs
             * will throw an exception if cluster has not been run yet
             *
             * @return  array  list of centroid distances
             */
            /*
    public function getCentroidDistance()
    {
        if (empty($this->centroid_distance)) {
            throw new Exception('Centroid distance has not been hydrated yet - run cluster method first');
        }
        return $this->centroid_distance;
    }
*/
            /**
             * contained switch for initialization method
             *
             * @param   $cluster_count  integer  how manu clusters are requested
             * @param   $method         string   type of initialization requested
             * @return                  array    list of centroids for initialization
             */
            protected function getInitialCentroids($cluster_count, $method)
            {
                if ($method == 'forgy') {
                    return $this->getForgyInitialization($cluster_count);
                }
                if ($method == 'random') {
                    return $this->getRandomInitialization($cluster_count);
                }
            }
            /**
             * get initialization points from random selection
             * try to lean towards center of data set
             *
             * @param   $cluster_count  integer  number of points to fetch
             * @return                  array    list of initialization points
             */
            protected function getRandomInitialization($cluster_count)
            {
                $random_keys = array_rand($this->data, $cluster_count);
                $random_keys = array_flip($random_keys);
                return array_intersect_key($this->data, $random_keys);
            }
            /**
             * get initialization points from random points in data set
             * tends to spread out points more
             *
             * @param   $cluster_count  integer  number of points to fetch
             * @return                  array    list of initialization points
             */
            protected function getForgyInitialization($cluster_count)
            {
                $data_range = $this->calculateRange($this->data);
                $random_points = [];
                for ($i = 0; $i < $cluster_count; $i++) {
                    $random_points[$i] = array_fill(0, count($this->data), null);
                    foreach ($data_range as $key => $range) {
                        $random_points[$i][$key] = ($range['min'] + lcg_value() * ($range['max'] - $range['min']));
                    }
                }
                return $random_points;
            }
            /**
             * calculate centroids based on clustered data
             *
             * @param   $clustered_data  array  multi-dimensional array of clustered data
             * @return                   array  list of centroids
             */
            protected function calculateCentroids(array $clustered_data)
            {
                $centroids = [];
                foreach ($clustered_data as $cluster) {
                    $cluster_sum = array_fill(0, count(current($cluster)), 0);
                    foreach ($cluster as $observation) {
                        foreach ($observation as $key => $value) {
                            $cluster_sum[$key] += $value;
                        }
                    }
                    $centroid = array_fill(0, count(current($cluster)), 0);
                    foreach ($cluster_sum as $key => $value) {
                        $centroid[$key] = $value / count($cluster);
                    }
                    array_push($centroids, $centroid);
                }
                return $centroids;
            }
            /**
             * calculate the closest centroid to an observation
             *
             * @param   $observation  array    observation from data set
             * @param   $centroids    array    list of centroids
             * @return                integer  index that observation should be clustered into
             */
            protected function calculateClosestCentroid(array $observation, array $centroids)
            {
                $centroid_distance = [];
                foreach ($centroids as $centroid) {
                    array_push($centroid_distance, $this->calculateDistance($observation, $centroid));
                }
                asort($centroid_distance);
                $centroid_distance = array_keys($centroid_distance);
                return array_shift($centroid_distance);
            }
            /**
             * check to see if clustered data has converged yet
             * if not, reassing new data to internal holder and return false to re-run script
             *
             * @param   $clustered_data      array    the old holder of clustered_data
             * @param   $new_clustered_data  array    new clustered_data to check against
             * @return                       boolean  whether or not convergence has occurred
             */
            protected function assignmentConvergenceCheck(array $clustered_data, array $new_clustered_data)
            {
                if (empty($clustered_data)) {
                    $this->clustered_data = $new_clustered_data;
                    return false;
                }
                foreach ($clustered_data as $key => $cluster) {
                    foreach ($cluster as $observation) {
                        if (!in_array($observation, $new_clustered_data[$key])) {
                            $this->clustered_data = $new_clustered_data;
                            // print_r($new_clustered_data);

                            return false;
                        }
                    }
                }
                return true;
            }
            /**
             * helper method to get the range of a set of data
             *
             * @param   $data  array  list of points to determine range of
             * @return         array  formatted return of range based on the data
             */
            protected function calculateRange($data)
            {
                $data_range = array_fill(0, count(current($data)), ['min' => null, 'max' => null]);
                foreach ($data as $observation) {
                    $key = 0;
                    foreach ($observation as $value) {
                        if ($data_range[$key]['min'] === null || $data_range[$key]['min'] > $value) {
                            $data_range[$key]['min'] = $value;
                        }
                        if ($data_range[$key]['max'] === null || $data_range[$key]['max'] < $value) {
                            $data_range[$key]['max'] = $value;
                        }
                        $key++;
                    }
                }
                return $data_range;
            }
            /**
             * helper method to determine the euclidean distance between two n-dimensional points
             * well, sum of squares, as the actual distance is unneeded - just the relative distance
             *
             * @param   $point_a  array  list of numeric values that determine a point
             * @param   $point_b  array  list of numeric values that determine a point
             * @return            float  distance between the points
             */
            protected function calculateDistance($point_a, $point_b)
            {
                $distance = 0;
                for ($i = 0, $count = count($point_a); $i < $count; $i++) {
                    $difference = $point_a[$i] - $point_b[$i];
                    $distance += pow($difference, 2);
                }
                return $distance;
            }
        }


        ?>