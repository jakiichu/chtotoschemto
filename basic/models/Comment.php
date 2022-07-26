<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $name_user
 * @property string $comment
 * @property string $date
 * @property int $id_post
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_user', 'comment', 'id_post'], 'required'],
            [['comment'], 'string'],
            [['date'], 'safe'],
            [['id_post'], 'integer'],
            [['name_user'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_user' => '',
            'comment' => 'Оставить коментарий',
            'date' => 'Date',
            'id_post' => '',
        ];
    }
}
