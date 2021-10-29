<?php
namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';


    public function actionSearch($field,$value){
        return "$field /  $value";
    }
}