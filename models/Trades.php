<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trades".
 *
 * @property int $id
 * @property int $good_id
 * @property int $created_at
 * @property bool|null $deleted
 * @property int $user_id
 *
 * @property Goods $good
 * @property Users $user
 */
class Trades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['good_id', 'created_at', 'user_id'], 'required'],
            [['good_id', 'created_at', 'user_id'], 'default', 'value' => null],
            [['good_id', 'created_at', 'user_id'], 'integer'],
            [['deleted'], 'boolean'],
            [['good_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['good_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'good_id' => 'Good ID',
            'created_at' => 'Created At',
            'deleted' => 'Deleted',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Good]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Goods::className(), ['id' => 'good_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
