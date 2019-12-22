<?php

use yii\helpers\Html;
use yii\grid\GridView;
use himiklab\colorbox\Colorbox;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PictureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Загруженные картинки';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => 800,
            'maxHeight' => 600,
        ],
    ],
    'coreStyle' => 1
]) ?>

<div class="picture-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Загрузить картинку', ['create'], ['class' => 'btn btn-success']) ?>
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
                'format' => 'raw',
                'value' => function($model) {
                    return '<a href="../'. $model->path .'" class="colorbox">'. Html::img('../' . $model->path, ['width' => '100', 'class' => 'colorbox']) .'</a>';
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
