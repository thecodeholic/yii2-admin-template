<?php
/**
 * User: TheCodeholic
 * Date: 4/26/2020
 * Time: 3:22 PM
 */

use backend\widgets\Nav;

?>
<div class="menu">
    <div class="menu-heading">
        <div class="menu-header-buttons-wrapper clearfix">
            <button type="button" class="btn btn-info btn-menu-header-collapse">
                <i class="fa fa-cogs"></i>
            </button>
            <!--Put your favourite pages here-->
            <div class="menu-header-buttons">
                <a href="#profile" class="btn btn-info btn-outline" data-title="Profile">
                    <i class="fa fa-user"></i>
                </a>
                <a href="#invoice" class="btn btn-info btn-outline" data-title="Invoice">
                    <i class="fa fa-file-pdf-o"></i>
                </a>
                <a href="#lobimail" class="btn btn-info btn-outline" data-title="Inbox">
                    <i class="fa fa-envelope"></i>
                </a>
                <a href="#calendar" class="btn btn-info btn-outline" data-title="Calendar">
                    <i class="fa fa-calendar"></i>
                </a>
            </div>
        </div>
    </div>
    <nav>
        <?php echo Nav::widget([
            'items' => [
                [
                    'label' => Yii::t('backend', 'Dashboard'),
                    'url' => ['/site/index'],
                    'icon' => 'fas fa-home'
                ],
                [
                    'label' => Yii::t('backend', 'Users'),
                    'url' => ['/user/index'],
                    'icon' => 'fas fa-users',
                    'badge' => 12,
                    'badgeClass' => 'badge badge-xs badge-danger'
                ],
            ]
        ]) ?>
    </nav>
    <div class="menu-collapse-line">
        <!--Menu collapse/expand icon is put and control from LobiAdmin.js file-->
        <div class="menu-toggle-btn" data-action="collapse-expand-sidebar"></div>
    </div>
</div>
