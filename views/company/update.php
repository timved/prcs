<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\company */

$this->title = 'Изменение данных: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p style="color: red"><?= Html::encode($model->status) ?></p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
