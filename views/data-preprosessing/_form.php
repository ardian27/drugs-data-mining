<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataPreprosessing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-preprosessing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'umur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_obat_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_obat_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_obat_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_obat_4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_obat_5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_obat_6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_obat_7')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
