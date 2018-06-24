<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if (Yii::$app->user->can('create')) {
        echo Html::a('Новая компания', ['create'], ['class' => 'btn btn-success']);
        } ?>
    </p>

    <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary' => false,
            'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],


                [
                    'attribute' => 'id',
                    'visible' => \Yii:: $app->user->can('create'),
                ],
                'name',
                'inn',
                'director',
                'address',
                [
                    'label' => 'Контактное лицо',
                    'attribute' => 'contact_name',
                    'format' => 'html',
                    'value' => function ($model) {
                        $names = '';
                        foreach ($model->contacts as $key => $name) {
                            if ($key !== 0) {
                                $names .= '<br />';
                            }
                            $names .= $name['name'];
                        }
                        return $names;
                    },
                ],
                [
                    'label' => 'Телефон',
                    'attribute' => 'contact_phone',
                    'format' => 'html',
                    'value' => function ($model) {
                        $phones = '';
                        foreach ($model->contacts as $key => $phone) {
                            if ($key !== 0) {
                                $phones .= '<br />';
                            }
                            $phones .= $phone['phone'];
                        }
                        return $phones;
                    },
                ],
                [
                    'label' => 'E-mail',
                    'attribute' => 'contact_email',
                    'format' => 'html',
                    'value' => function ($model) {
                        $emails = '';
                        foreach ($model->contacts as $key => $email) {
                            if ($key !== 0) {
                                $emails .= '<br />';
                            }
                            $emails .= Html::mailto($email['email'], "{$email['email']}");
                        }
                        return $emails;
                    },
                ],
                [
                    'attribute' => 'status',
                    'visible' => \Yii:: $app->user->can('create'),
                    'filter' => array(
                        'Подтверждено' => 'Подтверждено',
                        'Отклонено' => 'Отклонено',
                        'В ожидании' => 'В ожидании',
                    ),
                ],

                //'created_at',
                //'updated_at',

                ['class' => 'yii\grid\ActionColumn',
                    'visibleButtons' => [
                        'delete' => \Yii:: $app->user->can('delete'),
                        'update' => \Yii:: $app->user->can('update'),
                    ],
                ],
            ],
        ]);

    ?>
</div>
