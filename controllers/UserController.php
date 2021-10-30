<?php
namespace app\controllers;
use app\models\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';


    public function actionSearch($field,$value){
        $model = new User();
        return json_encode($model->search($field,$value));
    }
}