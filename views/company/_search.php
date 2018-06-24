<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'director') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'contact_name') ?>

    <?php if (Yii::$app->user->can('create')){
        echo $form->field($model, 'status')->dropDownList([
            'Подтверждено' => 'Подтверждено',
            'Отклонено' => 'Отклонено',
            'Ожидание' => 'Ожидание',
        ],
            $params = [
                'prompt' => 'Выберите статус...'
            ]);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
