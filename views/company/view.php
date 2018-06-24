<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1>Компания</h1>

    <p>
        <?php
        if (Yii::$app->user->can('update')) {
            echo Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        } ?>
        <?php
        if (Yii::$app->user->can('delete')) {
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            ['attribute' => 'id',
                'visible' => \Yii:: $app->user->can('create')],
            'name',
            'inn',
            'director',
            'address',
            ['attribute' => 'status',
                'visible' => \Yii:: $app->user->can('create')],
            ['attribute' => 'created_at',
                'visible' => \Yii:: $app->user->can('create')],
            ['attribute' => 'updated_at',
                'visible' => \Yii:: $app->user->can('create')],
//            'status',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>
    <h1>Контакты</h1>
    <p>
        <?php
        if (Yii::$app->user->can('update')) {
            echo Html::a('Добавить контакт', ['/contact/create', 'id' => $model->id], ['class' => 'btn btn-primary']);
        } ?>
    </p>
    <?php foreach ($model->contacts as $contact): ?>
    <div style="border: 1px solid black; margin: 5px 0; padding: 5px">
        <?= DetailView::widget([
            'model' => $contact,
            'attributes' => [
//            'id',
                ['attribute' => 'id',
                    'visible' => \Yii:: $app->user->can('create')],
                'name',
                'phone',
//                'email',
                ['attribute' => 'email',
                    'format' => 'html',
                    'value' =>
                        Html::mailto($contact->email, "{$contact->email}")],
//                'address',
//                ['attribute'=>'status',
//                    'visible' => \Yii:: $app ->user->can( 'create' )],
                ['attribute' => 'created_at',
                    'visible' => \Yii:: $app->user->can('create')],
                ['attribute' => 'updated_at',
                    'visible' => \Yii:: $app->user->can('create')],
//            'status',
//            'created_at',
//            'updated_at',
            ],
        ]) ?>
        <p>
            <?php
            if (Yii::$app->user->can('update')) {
                echo Html::a('Изменить контакт', ['/contact/update', 'id' => $contact->id], ['class' => 'btn btn-primary']);
            } ?>
        </p>
    </div>
    <?php endforeach; ?>

</div>
