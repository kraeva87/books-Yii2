<?php

namespace app\models;

use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public $authors;
    public $upload;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // title is required
            [['title'], 'required'],
            [['upload'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
}
