<?php


namespace app\models;

use Yii;
use yii\base\Model;
use Exception;
use yii\web\UploadedFile;

class PictureForm extends Model
{
    /**
     * @var string Название картинки
     */
    public $title;

    /**
     * @var string Описание
     */
    public $description;

    /**
     * @var string Путь к изображению
     */
    public $path;

    /**
     * @var UploadedFile Картинка
     */
    public $imageFile;

    /**
     * @var integer id пользователя
     */
    public $user_id;

    /**
     * @var Picture
     */
    private $_model;

    /**
     * PictureForm constructor.
     * @param Picture $model
     * @param array $config
     */
    public function __construct($model, $config = [])
    {
        $this->_model = $model;
        $this->user_id = Yii::$app->getUser()->id;
        $this->setAttributes($model->attributes);

        parent::__construct($config);
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
     * Сохранение изменений
     * @return boolean
     * @throws Exception
     */
    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        $this->_model->user_id = $this->user_id;
        $this->_model->title = $this->title;
        $this->_model->description = $this->description;
        $imageName = Yii::$app->security->generateRandomString(Picture::TITLE_LENGTH);
        $this->_model->path = Yii::getAlias('@web') . 'uploads/' . $imageName . '.' . $this->imageFile->extension;
        $this->imageFile->saveAs($this->_model->path);

        if (!$this->_model->save(false)) {
            throw new Exception('Не удалось сохранить изменения');
        }

        return true;
    }

    /**
     * Получить модель
     * @return Picture
     */
    public function getPicture()
    {
        return $this->_model;
    }
}