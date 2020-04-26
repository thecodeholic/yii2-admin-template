<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $userProfile backend\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?php echo $form->errorSummary($model) ?>
                    <?php echo $form->errorSummary($userProfile) ?>

                    <?= $form->field($userProfile, 'avatar')->textInput() ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($userProfile, 'first_name')->textInput() ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($userProfile, 'last_name')->textInput() ?>
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

                    <?= $form->field($model, 'status')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
