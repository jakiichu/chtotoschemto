<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .field-comment-id_post{
        padding: 0;
        margin: 0;
        width: 0;
        height: 0;
    }
</style>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($Comment, 'name_user')->hiddenInput(['value'=> Yii::$app->user->identity->username]) ?>

    <?= $form->field($Comment, 'comment')->textarea(['rows' => 2]) ?>


    <?= $form->field($Comment, 'id_post')->hiddenInput(['value'=> $id]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
