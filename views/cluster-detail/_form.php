<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClusterDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cluster-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cluster')->textInput() ?>

    <?= $form->field($model, 'id_data')->textInput() ?>

    <?= $form->field($model, 'x1')->textInput() ?>

    <?= $form->field($model, 'x2')->textInput() ?>

    <?= $form->field($model, 'x3')->textInput() ?>

    <?= $form->field($model, 'x4')->textInput() ?>

    <?= $form->field($model, 'x5')->textInput() ?>

    <?= $form->field($model, 'x6')->textInput() ?>

    <?= $form->field($model, 'x7')->textInput() ?>

    <?= $form->field($model, 'x8')->textInput() ?>

    <?= $form->field($model, 'x9')->textInput() ?>

    <?= $form->field($model, 'x10')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
