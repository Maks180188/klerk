<?php

namespace app\models;

use yii\base\Model;

class User extends Model
{
    public $id;
    public $name;
    public $patronymic;
    public $surname;
    public $updated_at;

    public function getTelNumbers()
    {
        return $this->hasMany(TelNumber::class, ['user_id' => 'id']);
    }

    public function beforeDelete()
    {
        foreach ($this->telNumbers as $c)
            $c->delete();
        return parent::beforeDelete();

    }

}
