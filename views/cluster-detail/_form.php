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

    <?= $form->field($model, 'anggota_cluster')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
