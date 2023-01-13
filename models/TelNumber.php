<?php

namespace app\models;

class TelNumber extends \yii\base\Model
{
    public $id;
    public int $user_id;
    public string $number;

    public function getCustomer()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}