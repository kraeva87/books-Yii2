<?php

namespace app\models;

use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // fio is required
            [['fio'], 'required'],
        ];
    }
}
