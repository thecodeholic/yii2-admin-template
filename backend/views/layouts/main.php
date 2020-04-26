<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--Page specific assets-->
<!--    <link rel="stylesheet" href="vendor/lobilist/css/lobilist.css">-->
<!--    <link rel="stylesheet" href="vendor/lobipanel/css/lobipanel.css">-->
<!--    <link rel="stylesheet" href="vendor/fullcalendar/fullcalendar.css">-->

    <!--This css file is for only demo usage-->
<!--    <link rel="stylesheet" href="css/demo.css"/>-->

</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-default navbar-header header">
    <a class="navbar-brand" href="#">
        <div class="navbar-brand-img"></div>
        <!--<img src="img/logo/lobiadmin-logo-text-white-32.png" class="hidden-xs" alt="" />-->
    </a>
    <!--Menu show/hide toggle button-->
    <ul class="nav navbar-nav pull-left show-hide-menu">
        <li>
            <a href="#" class="border-radius-0 btn font-size-lg" data-action="show-hide-sidebar">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <form class="navbar-search pull-left">
        <label for="search" class="sr-only">Search...</label>
        <input type="text" class="font-size-lg" name="search" id="search" placeholder="Search...">
        <a class="btn btn-search">
            <span class="glyphicon glyphicon-search"></span>
        </a>
        <a class="btn btn-remove">
            <span class="glyphicon glyphicon-remove"></span>
        </a>
    </form>
    <div class="navbar-items">
        <!--User avatar dropdown-->
        <ul class="nav navbar-nav navbar-right user-actions">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="user-avatar" src="img/users/me-160.jpg" alt="..."/>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#profile"><span class="glyphicon glyphicon-user"></span> &nbsp;&nbsp;Profile</a></li>
                    <li><a href="#timeline"><i class="fa fa-code-fork"></i> &nbsp;&nbsp;Timeline</a></li>
                    <li><a href="#lobimail"><span class="glyphicon glyphicon-envelope"></span> &nbsp;&nbsp;Messages</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="lock.html"><span class="glyphicon glyphicon-lock"></span> &nbsp;&nbsp;Lock screen</a>
                    </li>
                    <li><a href="login.html"><span class="glyphicon glyphicon-off"></span> &nbsp;&nbsp;Log out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="clearfix-xxs"></div>
    <div class="navbar-items-2">
        <!--Choose languages dropdown-->
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-actions">
        </ul>
    </div>
    <div class="clearfix"></div>
</nav>
<?php echo $this->render('_sidebar') ?>
<div id="main">
    <div id="ribbon" class="hidden-print">
        <a href="#dashboard" class="btn-ribbon" data-container="#main" data-toggle="tooltip"
           data-title="Show dashboard"><i
                    class="fa fa-home"></i></a>
        <span class="vertical-devider">&nbsp;</span>
        <button class="btn-ribbon" data-container="#main" data-action="reload" data-toggle="tooltip"
                data-title="Reload content by ajax"><i class="fa fa-refresh"></i></button>
        <ol class="breadcrumb">
        </ol>
    </div>
    <div id="content">
        <?php echo $content ?>
    </div>
</div>
<!--Setting box-->
<div class="setting-box hidden-print">
    <div class="btn-toggle">
        <span class="glyphicon glyphicon-cog"></span>
    </div>
    <form action class="lobi-form">
        <fieldset>
            <header>LobiAdmin Settings</header>
            <div class="form-group">
                <label class="checkbox-inline lobicheck lobicheck-rounded">
                    Header fixed
                    <input type="checkbox" class="fix-header" value="1">
                    <i></i>
                </label>
            </div>
            <div class="form-group">
                <label class="checkbox-inline lobicheck lobicheck-rounded">
                    Menu fixed
                    <input type="checkbox" class="fix-menu">
                    <i></i>
                </label>
            </div>
            <div class="form-group">
                <label class="checkbox-inline lobicheck lobicheck-rounded">
                    Ribbon fixed
                    <input type="checkbox" class="fix-ribbon">
                    <i></i>
                </label>
            </div>
            <div class="row row-skin-options">
                <h4>Skins</h4>
                <div class="col-xs-3">
                    <label class="radio">
                        <input type="radio" name="header-skin" value="0" checked>
                        <div>
                            <div class="setting-header"></div>
                            <div class="setting-menu"></div>
                        </div>
                        <i class="fa fa-check-square"></i>
                    </label>
                </div>
                <div class="col-xs-3">
                    <label class="radio">
                        <input type="radio" name="header-skin" value="header-cyan">
                        <div>
                            <div class="setting-header"></div>
                            <div class="setting-menu"></div>
                        </div>
                        <i class="fa fa-check-square"></i>
                    </label>
                </div>
                <div class="col-xs-3">
                    <label class="radio">
                        <input type="radio" name="header-skin" value="header-green">
                        <div>
                            <div class="setting-header"></div>
                            <div class="setting-menu"></div>
                        </div>
                        <i class="fa fa-check-square"></i>
                    </label>
                </div>
                <div class="col-xs-3">
                    <label class="radio">
                        <input type="radio" name="header-skin" value="header-brown">
                        <div>
                            <div class="setting-header"></div>
                            <div class="setting-menu"></div>
                        </div>
                        <i class="fa fa-check-square"></i>
                    </label>
                </div>
            </div>
            <div class="row row-bg-options">
                <h4>Background</h4>
                <div class="col-xs-3">
                    <label class="radio" style="background-color: #f2f2f2">
                        <input type="radio" name="body-bg" data-is-color="true" value="#f2f2f2" checked>
                        <i class="fa fa-check-square"></i>
                    </label>
                </div>
                <div class="col-xs-3">
                    <label class="radio" style="background-color: #edf1f4">
                        <input type="radio" name="body-bg" data-is-color="true" value="#edf1f4">
                        <i class="fa fa-check-square"></i>
                    </label>
                </div>
                <div class="col-xs-3">
                    <label class="radio" style="background-image: url('img/bg/bg1.png')">
                        <input type="radio" name="body-bg" value="img/bg/bg1.png">
                        <i class="fa fa-check-square"></i>
                    </label>
                </div>
                <div class="col-xs-3">
                    <label class="radio" style="background-image: url('img/bg/bg4.png')">
                        <input type="radio" name="body-bg" value="img/bg/bg4.png">
                        <i class="fa fa-check-square"></i>
                    </label>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-pretty" data-action="clear-storage"><i
                        class="fa fa-refresh"></i>
                Clear local storage
            </button>
        </fieldset>
    </form>
</div>

<!--Loading indicator for ajax page loading-->
<div class="spinner spinner-horizontal hide">
    <span class="spinner-text">Loading...</span>
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
</div>

<!--<script type="text/javascript" src="vendor/lobipanel/js/lobipanel.js"></script>-->

<!--Page specific assets-->
<!--<script src="vendor/sparkline/jquery.sparkline.min.js"></script>-->
<!--<script src='vendor/chartjs/Chart.min.js'></script>-->
<!--<script src='vendor/lobilist/js/lobilist.js'></script>-->
<!--<script src='vendor/moment/moment.min.js'></script>-->
<!--<script src='vendor/fullcalendar/fullcalendar.min.js'></script>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
