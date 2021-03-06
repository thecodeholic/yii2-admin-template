<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 5:37 PM
 */

namespace backend\models;


use Imagine\Image\Box;
use yii\helpers\FileHelper;
use yii\imagine\Image;

/**
 * Class User
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package backend\models
 */
class User extends \common\models\User
{
    const SCENARIO_CREATE = 'create';

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => self::class, 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => self::class, 'message' => 'This email address has already been taken.'],

            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],

            ['password', 'required', 'on' => self::SCENARIO_CREATE],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'required', 'on' => self::SCENARIO_CREATE],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function saveWithProfile($data, \common\models\UserProfile $profile)
    {
        if (!$this->load($data) || !$profile->load($data) || !$this->save()) {
            return false;
        }
        //TODO Send email
        $profile->user_id = $this->id;
        if ($profile->avatar) {
            if ($profile->avatar_path) {
                unlink($profile->getAvatarPath());
            }
            $profile->avatar_path = '/profile/' . \Yii::$app->security->generateRandomString()
                . '.' . $profile->avatar->extension;
            $imagePath = $profile->getAvatarPath();
            if (!is_dir(dirname($imagePath))) {
                FileHelper::createDirectory(dirname($imagePath));
            }
            $profile->avatar->saveAs($imagePath);
            Image::getImagine()
                ->open($imagePath)
                ->thumbnail(new Box(256, 256))
                ->save();
        }
        $this->link('profile', $profile);

        return true;
    }

    public function getAvatarUrl()
    {
        return $this->profile ? $this->profile->getAvatarUrl() : '';
    }
}