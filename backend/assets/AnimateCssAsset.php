<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 2:42 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;

/**
 * Class AnimateCssAsset
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package backend\assets
 */
class AnimateCssAsset extends AssetBundle
{
    public $sourcePath = '@vendor/npm-asset/animate.css';
    public $css = [
        'animate'.(YII_DEBUG ? '' : '.min').'.css'
    ];

    public $publishOptions = [
        'only' => ['animate*.css']
    ];
}