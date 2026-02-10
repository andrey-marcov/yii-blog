<?php

namespace app\models;

use yii\base\BaseObject;
use yii\web\IdentityInterface;

class UserIdentity extends BaseObject implements IdentityInterface
{
    public $id;
    private $_user;

    public static function findIdentity($id)
    {
        return new static(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->_user->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByUsername($username)
    {
        $user = \app\models\User::find()
            ->where(['username' => $username])
            ->one();

        if ($user) {
            return new static([
                'id' => $user->id,
                '_user' => $user,
            ]);
        }
        return null;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->_user->password);
    }
}