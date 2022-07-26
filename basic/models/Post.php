<?php

namespace app\models;

use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $img
 * @property string $name_creator
 * @property string $date
 * @property int $category_id
 */
class Post extends \yii\db\ActiveRecord
{



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'name_creator'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['category_id'], 'integer'],
            [['name', 'img', 'name_creator'], 'string', 'max' => 255],
        ];
    } 

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
            'img' => 'Изображение',
            'name_creator' => 'Name Creator',
            'date' => 'Date',
            'category_id' => 'Category ID',
        ];
    }
    
}
