<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 5:38 PM
 */

namespace backend\models;


/**
 * Class UserProfile
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package backend\models
 */
class UserProfile extends \common\models\UserProfile
{
    /**
     * @var \yii\web\UploadedFile
     */
    public $avatar;

    public function rules()
    {
        return array_merge(parent::rules(), [
//            ['avatar', 'image']
        ]);
    }
}