<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $content
 * @property string $amount
 * @property string $min_amount
 * @property string $term
 * @property string|null $keywords
 * @property string|null $description
 * @property string $status
 * @property string|null $analytics
 * @property string|null $name
 * @property string|null $title
 * @property string|null $min_term
 * @property string|null $text_succes
 * @property string|null $text_fail
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'amount','min_amount', 'term','min_term', 'status'], 'required'],
            [['status'], 'string'],
            [['content', 'analytics'], 'string', 'max' => 20000],
            [['amount', 'term','name','title','min_term'], 'string', 'max' => 255],
            [['keywords', 'description'], 'string', 'max' => 1000],
            [['text_fail'], 'string', 'max' => 1000],
            [['text_succes'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Текст внизу сайта',
            'amount' => 'Максимальное значение кредита',
            'min_amount' => 'Минимальное значение кредита',
            'term' => 'Срок кредита',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'status' => 'Статус',
            'analytics' => 'Аналитика',
            'name' => 'Название',
            'title' => 'Title',
            'min_term' => 'Минимальное значение срока',
            'text_succes' => 'Текст успешной заявки',
            'text_fail' => 'Текст отказной заявки',
        ];
    }
}
