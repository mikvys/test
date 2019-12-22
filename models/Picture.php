<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "picture".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $path
 * @property int $user_id
 */
class Picture extends \yii\db\ActiveRecord
{
    const TITLE_LENGTH = 15;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['path'], 'string', 'max' => 255],
            ['imageFile', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'path' => 'Изображение',
            'user_id' => 'Пользователь',
            'imageFile' => 'Изображение',
        ];
    }

    /**
     * Получить регион
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
