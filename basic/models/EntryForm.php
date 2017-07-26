<?php
/**
 * Created by PhpStorm.
 * User: litsoft
 * Date: 2017/7/26
 * Time: 11:50
 */
namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name','email'],'required'],
            ['email','email']
        ];
    }
}