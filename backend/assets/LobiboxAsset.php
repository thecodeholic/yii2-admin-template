<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 2:47 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;

/**
 * Class LobiboxAsset
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package backend\assets
 */
class LobiboxAsset extends AssetBundle
{
    public $basePath = '@webroot/vendor/lobibox';
    public $baseUrl = '@web/vendor/lobibox';
    public $css = [
        'css/lobibox.css'
    ];
    public $js = [
        'js/lobibox.js'
    ];
}