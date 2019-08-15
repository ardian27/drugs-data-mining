<?php

namespace app\controllers;

use app\models\DataAwal;

use app\models\DataAwalSearch;

class ProsesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDataAwal()
    {

        $query = DataAwal::find();
        
        
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 10,
        ],
        
    ]);

        return $this->render('//data-awal', [
            'model' => $dataProvider,
        ]);
    }

    // public function actionData()
    // {
    //     $model  = DataAwal::find();
    //     return $this->render('//data-awal', [
    //         'dataProvider' => $this->$model,
    //     ]);
    // }

}