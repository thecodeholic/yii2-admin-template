<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 2:19 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;

/**
 * Class FontAwesome5Asset
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package backend\assets
 */
class FontAwesome5Asset extends AssetBundle
{
    public $sourcePath = '@vendor/components/font-awesome';
    public $css = [
        'css/all' . ( YII_DEBUG ? '' : '.min' ) . '.css'
    ];

    public $publishOptions = [
        'only' => [
            'css/all*.css'
        ]
    ];
}