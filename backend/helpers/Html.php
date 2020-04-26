<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 6:49 PM
 */

namespace backend\helpers;

use backend\models\User;

/**
 * Class Html
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package backend\helpers
 */
class Html
{
    public static function userStatusLabel($status)
    {
        $class = '';
        switch ($status) {
            case User::STATUS_INACTIVE;
                $class = 'warning';
                break;
            case User::STATUS_ACTIVE;
                $class = 'success';
                break;
            case User::STATUS_DELETED;
                $class = 'danger';
                break;
        }
        return \yii\helpers\Html::tag('span', User::getStatusLabels()[$status], [
            'class' => "label label-$class"
        ]);
    }
}