<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tables\company */
/* @var $modelContact app\models\tables\contact */

$this->title = 'Новая компания';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_createForm', [
        'model' => $model,
    ]) ?>

</div>
