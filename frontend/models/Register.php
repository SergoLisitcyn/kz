<?php


namespace frontend\models;


use yii\db\ActiveRecord;

class Register extends ActiveRecord
{

    public function attributeLabels() {

        return [
            'name' => 'Имя',
            'email' => 'Ваш email',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'mobile' => 'Мобильный Телефон',
            'sex' => 'Пол',
            'birthdate' => 'Дата рождения',
            'passport_id' => 'ИИН',
            'residence' => 'Место проживания',
            'amount' => 'Cумма',
            'term' => 'Срок',
        ];
    }

    public function rules() {
        return [
            [['name', 'email'], 'trim'],
            ['name', 'required', 'message' => 'Поле «Ваше имя» обязательно для заполнения'],
            ['surname', 'required', 'message' => 'Поле «Ваша Фамилия» обязательно для заполнения'],
            ['patronymic', 'required', 'message' => 'Поле «Ваш Отчество» обязательно для заполнения'],
            ['mobile', 'required', 'message' => 'Поле «Ваша Фамилия» обязательно для заполнения'],
            ['email', 'email', 'message' => 'Поле «Моб. Телефон» должно быть адресом почты'],
            ['birthdate',  'string','max' => 255, 'message' => 'Поле «Место проживания» обязательно для заполнения'],
            ['passport_id',  'required', 'message' => 'Поле «ИИН» обязательно для заполнения'],
            ['residence',  'required', 'message' => 'Поле «ИИН» обязательно для заполнения'],
            ['amount', 'string','max' => 255],
            ['term', 'string','max' => 255],
            ['sex', 'string','max' => 255],
        ];
    }
}