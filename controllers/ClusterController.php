<?php

namespace app\controllers;

use Yii;
use app\models\Cluster;
use app\models\ClusterDetail;
use app\models\ClusterSearch;
use app\models\DataTransformasi;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * ClusterController implements the CRUD actions for Cluster model.
 */
class ClusterController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cluster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClusterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Cluster model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Cluster #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionProses()
    {
        
        // $model = new Cluster();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id_cluster]);
        // }
        // $cluster = $model->jumlah_cluster;
        // $dataAwalUmur = DataTransformasi::find()->select('umur')->asArray()->limit($cluster)->all();
        // $dataAwalJk = DataTransformasi::find()->select('jenis_kelamin')->asArray()->limit($cluster)->all();
        // $dataAwalRas = DataTransformasi::find()->select('ras')->asArray()->limit($cluster)->all();
        // $dataAwalJ1 = DataTransformasi::find()->select('jenis_obat_1')->asArray()->limit($cluster)->all();
        // $dataAwalJ2 = DataTransformasi::find()->select('jenis_obat_2')->asArray()->limit($cluster)->all();
        // $dataAwalJ3 = DataTransformasi::find()->select('jenis_obat_3')->asArray()->limit($cluster)->all();
        // $dataAwalJ4 = DataTransformasi::find()->select('jenis_obat_4')->asArray()->limit($cluster)->all();
        // $dataAwalJ5 = DataTransformasi::find()->select('jenis_obat_5')->asArray()->limit($cluster)->all();
        // $dataAwalJ6 = DataTransformasi::find()->select('jenis_obat_6')->asArray()->limit($cluster)->all();
        // $dataAwalJ7 = DataTransformasi::find()->select('jenis_obat_7')->asArray()->limit($cluster)->all();
        // $dataAll = DataTransformasi::find()->asArray()->limit($cluster)->all();

        // $c_umur = toarray($dataAwalUmur, 'umur');
        // $c_jk = toarray($dataAwalJk, 'jenis_kelamin');
        // $c_ras = toarray($dataAwalRas, 'ras');
        // $c_j1 = toarray($dataAwalJ1, 'jenis_obat_1');
        // $c_j2 = toarray($dataAwalJ2, 'jenis_obat_2');
        // $c_j3 = toarray($dataAwalJ3, 'jenis_obat_3');
        // $c_j4 = toarray($dataAwalJ4, 'jenis_obat_4');
        // $c_j5 = toarray($dataAwalJ5, 'jenis_obat_5');
        // $c_j6 = toarray($dataAwalJ6, 'jenis_obat_6');
        // $c_j7 = toarray($dataAwalJ7, 'jenis_obat_7');
        // $c_dataAll = array_values($dataAll);


        function toarray($array_multi, $v)
        {
            $newarray = array();
            foreach ($array_multi as $key => $value) {
                $newarray[$key] = $value[$v];
            }
            return $newarray;
        }

        // DATA TRANSFORMATION
        // $id = DataTransformasi::find()->select('id_data')->asArray()->all();
        $umur = DataTransformasi::find()->select('umur')->limit(10)->asArray()->all();
        $jk = DataTransformasi::find()->select('jenis_kelamin')->limit(10)->asArray()->all();
        $ras = DataTransformasi::find()->select('ras')->limit(10)->asArray()->all();
        $j1 = DataTransformasi::find()->select('jenis_obat_1')->limit(10)->asArray()->all();
        $j2 = DataTransformasi::find()->select('jenis_obat_2')->limit(10)->asArray()->all();
        $j3 = DataTransformasi::find()->select('jenis_obat_3')->limit(10)->asArray()->all();
        $j4 = DataTransformasi::find()->select('jenis_obat_4')->limit(10)->asArray()->all();
        $j5 = DataTransformasi::find()->select('jenis_obat_5')->limit(10)->asArray()->all();
        $j6 = DataTransformasi::find()->select('jenis_obat_6')->limit(10)->asArray()->all();
        $j7 = DataTransformasi::find()->select('jenis_obat_7')->limit(10)->asArray()->all();


        // $t_id = convertNumArray($id, 'id_data');
        $t_umur = toarray($umur, 'umur');
        $t_jk = toarray($jk, 'jenis_kelamin');
        $t_ras = toarray($ras, 'ras');
        $t_j1 = toarray($j1, 'jenis_obat_1');
        $t_j2 = toarray($j2, 'jenis_obat_2');
        $t_j3 = toarray($j3, 'jenis_obat_3');
        $t_j4 = toarray($j4, 'jenis_obat_4');
        $t_j5 = toarray($j5, 'jenis_obat_5');
        $t_j6 = toarray($j6, 'jenis_obat_6');
        $t_j7 = toarray($j7, 'jenis_obat_7');

        // $array = $c_umur;
        // $kode = DataTransformasi::find()
        //     ->select('id_data,umur,jenis_kelamin,ras,jenis_obat_1,jenis_obat_2,jenis_obat_3,jenis_obat_4,jenis_obat_5,jenis_obat_6,jenis_obat_7')
        //     ->select('id_data')
        //     ->asArray()
        //     ->all();

        $alldata = array();
        $a = 0;
        foreach ($t_umur as $data) {
            $alldata[$a] = [
                // $t_id[$a],
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

        

        return $this->render(
            'proses',
            [
                'model' => $alldata,
            ]
        );
    }


    /**
     * Creates a new Cluster model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // function toarray($array_multi, $v)
        // {
        //     $newarray = array();
        //     foreach ($array_multi as $key => $value) {
        //         $newarray[$key] = $value[$v];
        //     }
        //     return $newarray;
        // }

        $request = Yii::$app->request;
        $model = new Cluster();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new Cluster",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {



            if ($model->load($request->post()) && $model->save()) {
                $cluster = $model->jumlah_cluster;
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

                $c_umur = toarray($dataAwalUmur, 'umur');
                $c_jk = toarray($dataAwalJk, 'jenis_kelamin');
                $c_ras = toarray($dataAwalRas, 'ras');
                $c_j1 = toarray($dataAwalJ1, 'jenis_obat_1');
                $c_j2 = toarray($dataAwalJ2, 'jenis_obat_2');
                $c_j3 = toarray($dataAwalJ3, 'jenis_obat_3');
                $c_j4 = toarray($dataAwalJ4, 'jenis_obat_4');
                $c_j5 = toarray($dataAwalJ5, 'jenis_obat_5');
                $c_j6 = toarray($dataAwalJ6, 'jenis_obat_6');
                $c_j7 = toarray($dataAwalJ7, 'jenis_obat_7');
                $c_dataAll = array_values($dataAll);



                // DATA TRANSFORMATION
                // $id = DataTransformasi::find()->select('id_data')->asArray()->all();
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


                // $t_id = convertNumArray($id, 'id_data');
                $t_umur = toarray($umur, 'umur');
                $t_jk = toarray($jk, 'jenis_kelamin');
                $t_ras = toarray($ras, 'ras');
                $t_j1 = toarray($j1, 'jenis_obat_1');
                $t_j2 = toarray($j2, 'jenis_obat_2');
                $t_j3 = toarray($j3, 'jenis_obat_3');
                $t_j4 = toarray($j4, 'jenis_obat_4');
                $t_j5 = toarray($j5, 'jenis_obat_5');
                $t_j6 = toarray($j6, 'jenis_obat_6');
                $t_j7 = toarray($j7, 'jenis_obat_7');

                $array = $c_umur;
                $kode = DataTransformasi::find()
                    ->select('id_data,umur,jenis_kelamin,ras,jenis_obat_1,jenis_obat_2,jenis_obat_3,jenis_obat_4,jenis_obat_5,jenis_obat_6,jenis_obat_7')
                    ->select('id_data')
                    ->asArray()
                    ->all();

                $alldata = array();
                $a = 0;
                foreach ($t_umur as $data) {
                    $alldata[$a] = [
                        // $t_id[$a],
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
                $kmeans = new Kmeans($alldata);
                $kmeans->cluster($cluster); // setting jumlah cluster 
                $clustered_data = $kmeans->getClusteredData();
                $centroids = $kmeans->getCentroids();

                $id_cluster = Cluster::find()->max('id_cluster');

                $datainsert = array();
                foreach ($clustered_data as $key => $value) {
                    $x = $key;

                    $length = count($clustered_data[0][0]);
                    foreach ($value as $key => $data) {
                        // for ($i = 0; $i < $length; $i++) {

                        $datainsert[] = [
                            'id_cluster' => $id_cluster,
                            'id_data' => $x + 1,
                            'x1' => $data[0],
                            'x2' => $data[1],
                            'x3' => $data[2],
                            'x4' => $data[3],
                            'x5' => $data[4],
                            'x6' => $data[5],
                            'x7' => $data[6],
                            'x8' => $data[7],
                            'x9' => $data[8],
                            'x10' => $data[9],

                        ];
                    }
                    // }
                }
                if (count($datainsert) > 0) {
                    $columnNameArray = ['id_cluster', 'id_data', 'x1', 'x2', 'x3', 'x4', 'x5', 'x6', 'x7', 'x8', 'x9', 'x10'];
                    // below line insert all your record and return number of rows inserted
                    $insertCount = Yii::$app->db->createCommand()
                        ->batchInsert(
                            'cluster_detail',
                            $columnNameArray,
                            $datainsert
                        )
                        ->execute();
                }

                return $this->render('dream', ['clustered_data' => $clustered_data]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionDetail($id)
    {
        $data = ClusterDetail::findAll(['id_cluster' => $id]);


        return $this->render('dream', ['clustered_data' => $data]);
    }



    /**
     * Updates an existing Cluster model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update Cluster #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Cluster #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update Cluster #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_cluster]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Cluster model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing Cluster model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Cluster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cluster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cluster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


class KMeans
{
    // initial, unmodified data field
    protected $data;
    protected $hasil;
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
            // print("<pre>" . "" . sizeof($new_clustered_data) . "</pre>");
            // print("<pre>" . "" . print_r($new_clustered_data, true) . "</pre>");
            // setHasil($new_clustered_data);
            $this->hasil = $new_clustered_data;
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

    protected function getInitialCentroids($cluster_count, $method)
    {
        if ($method == 'forgy') {
            return $this->getForgyInitialization($cluster_count);
        }
        if ($method == 'random') {
            return $this->getRandomInitialization($cluster_count);
        }
    }
    protected function getRandomInitialization($cluster_count)
    {
        $random_keys = array_rand($this->data, $cluster_count);
        $random_keys = array_flip($random_keys);
        return array_intersect_key($this->data, $random_keys);
    }
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
    public function setHasil($datahasil)
    {

        return $this->hasil = $datahasil;
    }

    public function getHasil()
    {

        return $this->hasil;
    }
}

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
