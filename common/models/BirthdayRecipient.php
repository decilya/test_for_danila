<?php

namespace common\models;

use yii\base\Model;

/*
  Т.к. у нас по условию задачи есть только Анна Николаевна Шульц, то создал модель только с ней,
   а не стал создавать таблицу в БД (но из этого сделать талицу в БД очень лего)
*/
class BirthdayRecipient extends Model
{
    public $name = 'Анна Николаевна Шульц';
    public $birthDate = '29.02.1978';
    public $cityOfBirth = 'Владивосток';
    public $address = 'г. Елизово, ул. Ленина, д. 2, кв. 3';
    public $phone = '+79119947871'; // мой номер телефона (телеграмм тоже на него)

    public function rules()
    {
        return [
            [['name', 'birthDate', 'cityOfBirth', 'address', 'phone'], 'required'],
            ['phone', 'match', 'pattern' => '/^\+?[1-9]\d{10,14}$/'],
        ];
    }
}
