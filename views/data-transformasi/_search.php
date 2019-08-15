<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataTransformasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-transformasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_data') ?>

    <?= $form->field($model, 'umur') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'ras') ?>

    <?= $form->field($model, 'jenis_obat_1') ?>

    <?php // echo $form->field($model, 'jenis_obat_2') ?>

    <?php // echo $form->field($model, 'jenis_obat_3') ?>

    <?php // echo $form->field($model, 'jenis_obat_4') ?>

    <?php // echo $form->field($model, 'jenis_obat_5') ?>

    <?php // echo $form->field($model, 'jenis_obat_6') ?>

    <?php // echo $form->field($model, 'jenis_obat_7') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
