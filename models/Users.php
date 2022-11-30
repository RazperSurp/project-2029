<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property int $phone
 * @property string $firstname
 * @property string $secondname
 * @property string|null $thirdname
 * @property string $address
 * @property bool|null $deleted
 *
 * @property BankCardUser[] $bankCardUsers
 * @property Trades[] $trades
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email', 'phone', 'firstname', 'secondname', 'address'], 'required'],
            [['password'], 'string'],
            [['phone'], 'default', 'value' => null],
            [['phone'], 'integer'],
            [['deleted'], 'boolean'],
            [['login'], 'string', 'max' => 16],
            [['email', 'firstname', 'secondname', 'thirdname', 'address'], 'string', 'max' => 125],
            [['email'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
            'phone' => 'Phone',
            'firstname' => 'Firstname',
            'secondname' => 'Secondname',
            'thirdname' => 'Thirdname',
            'address' => 'Address',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[BankCardUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankCardUsers()
    {
        return $this->hasMany(BankCardUser::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Trades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrades()
    {
        return $this->hasMany(Trades::className(), ['user_id' => 'id']);
    }
}
