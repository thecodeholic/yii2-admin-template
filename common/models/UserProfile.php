<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int|null    $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $avatar_path
 * @property int|null    $created_at
 * @property int|null    $updated_at
 *
 * @property User        $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 55],
            [['avatar_path'], 'string', 'max' => 2000],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('backend', 'User ID'),
            'first_name' => Yii::t('backend', 'First name'),
            'last_name' => Yii::t('backend', 'Last name'),
            'avatar_path' => Yii::t('backend', 'Avatar Path'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
