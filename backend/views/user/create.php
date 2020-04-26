<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $userProfile backend\models\UserProfile */

$this->title = Yii::t('backend', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userProfile' => $userProfile
    ]) ?>

</div>
