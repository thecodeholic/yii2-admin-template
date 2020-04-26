<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $profile backend\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $form = ActiveForm::begin([
                        'options' => ['enctype' => 'multipart/form-data']
                    ]); ?>

                    <?= $form->field($profile, 'avatar')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'initialPreview' => $model->getAvatarUrl() ? [$model->getAvatarUrl()]: [],
                            'initialPreviewAsData' => true,
                            'showUpload' => false
                        ]
                    ]); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($profile, 'first_name')->textInput() ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($profile, 'last_name')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'username')->textInput() ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'email')->textInput() ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'status')->dropDownList(\common\models\User::getStatusLabels()) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
