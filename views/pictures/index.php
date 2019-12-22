<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PictureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pictures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Picture', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            [
                'attribute'=>'path',
                'format' => ['image',['width'=>'100']],
                'value' => function($model) {
                    return '../'.$model->path;
                }
            ],
            [
                'attribute' => 'user_id',
                'value' => function($model) {
                    return $model->user->username;
                },
                'filter' => \app\models\User::map(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
