<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => [
                    'style'=> 'width: 80px'
                ]
            ],
            [
                'label' => Yii::t('backend', 'Avatar'),
                'content' => function($model){
                    return Html::a(\backend\helpers\Html::userAvatar($model->profile),['update', 'id' => $model->id]);
                }
            ],
            [
                'attribute' => 'full_name',
                'content' => function($model){
                    return $model->profile->getFullName();
                }
            ],
            [
                'attribute' => 'username',
                'contentOptions' => [
                    'style' => 'width: 120px'
                ]
            ],
            'email:email',
            [
                'attribute' => 'status',
                'filter' => \common\models\User::getStatusLabels(),
                'contentOptions' => [
                    'style' => 'width: 120px;'
                ],
                'content' => function($model){
                    return \backend\helpers\Html::userStatusLabel($model->status);
                }
            ],
            'updated_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [
                        'class' => 'text-nowrap'
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
