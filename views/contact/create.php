<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tables\Contact */

$this->title = 'Добавить контакт';

?>
<div class="contact-create">

    <h1><?= Html::encode($this->title) ?></h1>
<p><?=Html::a($model->company->name, ['/company/view', 'id' => $model->company->id])?></p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
