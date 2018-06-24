<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\company */
/* @var $modelContact app\models\tables\contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput() ?>

    <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?php if (Yii::$app->user->can('admin')) {
        echo $form->field($model, 'status')->dropDownList([
            'Подтверждено' => 'Подтверждено',
            'В ожидании' => 'В ожидании',
            'Отклонено' => 'Отклонено',
        ],
            $params = [
                'prompt' => 'Изменить статус...',
                'onchange'=> Yii::$app->cache->flush()]
        );
    }
    ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?=Html::a('Добавить контакт', ['/contact/create', 'id' => $model->id], ['class' => 'btn btn-primary'])
         ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
