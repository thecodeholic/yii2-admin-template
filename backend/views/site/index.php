<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$this->registerJsFile('/js/dashboard.js', [
    'depends' => [
        \backend\assets\AppAsset::class
    ]
]);
?>
<div class="site-index">
    Dashboard
</div>
