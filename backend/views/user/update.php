<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $profile backend\models\UserProfile */

$this->title = Yii::t('backend', 'Update User: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'profile' => $profile
    ]) ?>

</div>
