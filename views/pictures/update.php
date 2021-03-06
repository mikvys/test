<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PictureForm */

$this->title = 'Редактирование записи: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->getPicture()->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="picture-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
