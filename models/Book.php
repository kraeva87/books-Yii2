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
            // title, year, description, isbn is required
            [['title', 'year', 'description', 'isbn'], 'required'],
            [['upload'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
}
