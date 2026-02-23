<?php

namespace app\models;

use yii\base\BaseObject;
use yii\web\IdentityInterface;

class UserIdentity extends BaseObject implements IdentityInterface
{
    public $id;
    public $_user;

    public static function findIdentity($id)
    {
        $user = \app\models\User::findOne($id);
        if ($user) {
            $identity = new static();
            $identity->id = $user->id;
            $identity->_user = $user;
            return $identity;
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->_user->username;
    }

    public function getAuthKey()
    {
        return $this->_user->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->_user->auth_key === $authKey;
    }

    public static function findByUsername($username)
    {
        $user = \app\models\User::find()
            ->where(['username' => $username])
            ->one();

        if ($user) {
            $identity = new static();
            $identity->id = $user->id;
            $identity->_user = $user;
            return $identity;
        }
        return null;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->_user->password_hash);
    }
}