<?php

namespace app\models;

use yii\db\ActiveRecord;


class User extends ActiveRecord
{


    public function rules()
    {
        return [
            [['username','email'],'safe']
        ];
    }

    public static function findIdentity($id)
    {
        return User::findOne(['id' => $id]);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::findOne(['accessToken' => $token]);
        if($user != null)
        {
            return $user;
        }
        return new User();
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        return $this->accessToken;
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->accessToken == $authKey;
    }

    public function refreshAccessToken()
    {
        $this->accessToken = md5(date('c'));
    }
}