<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Picture */
/* @var $form yii\widgets\ActiveForm */

$this->title = "My application";
?>

<div class="picture-form">

    <?= Alert::widget([
        'options' => [
            'class' => 'add-picture-success-message alert alert-success',
            'style' => 'display: none',
        ],
        'body' => 'Картинка успешно сохранена.',
    ]); ?>

    <h2>Загрузка картинок</h2>

    <form id="add-picture-form" name="add-picture-form" action="/pictures/create" method="POST" enctype="multipart/form-data">
        <div class="form-group field-pictureform-title required">
            <label class="control-label" for="pictureform-title">Название</label>
            <input type="text" id="pictureform-title" class="form-control" name="PictureForm[title]" maxlength="255" aria-required="true">

            <div class="help-block help-block__pictureform-title"></div>
        </div>
        <div class="form-group field-pictureform-description">
            <label class="control-label" for="pictureform-description">Описание</label>
            <textarea id="pictureform-description" class="form-control" name="PictureForm[description]" rows="6"></textarea>

            <div class="help-block help-block__pictureform-description"></div>
        </div>
        <div class="form-group field-pictureform-imagefile">
            <label class="control-label" for="pictureform-imagefile">Изображение</label>
            <input type="hidden" name="PictureForm[imageFile]" value=""><input type="file" id="pictureform-imagefile" name="PictureForm[imageFile]">

            <div class="help-block help-block__pictureform-imagefile"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
</div>

