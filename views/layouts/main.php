<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
$session = Yii::$app->session;
$session->open();
$baseUrl_main=Yii::$app->request->baseUrl.'/assets/dangki/';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<section class="hero">
    <header>
        <div class="wrapper">
            <a href="<?php echo Yii::$app->request->getBaseUrl();?>"><img src="<?php echo $baseUrl_main;?>img/logo.png" class="logo" alt="" titl=""/></a>
            <a href="<?php echo Yii::$app->request->getBaseUrl();?>" class="hamburger"></a>
            <?php if(isset($_SESSION['user'])){
                $user=$_SESSION['user'];
                ?>
                <nav style="color: white;">
                    <ul>
                        <li><a href="<?php echo Yii::$app->request->getBaseUrl();?>/dangki/dangki/view?id=<?php echo $user->id;?>"><?php echo $user->name;?></a>
                            <a style="color: #9e9e9e;" href="<?php echo Yii::$app->request->getBaseUrl();?>/dangki/dangki/dangxuat" class="">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>
                <?php }else {?>
            <nav>
                        <a href="<?php echo Yii::$app->request->getBaseUrl();?>/dangki/dangki/dangki" class="login_btn">Đăng kí</a>

                        <a href="<?php echo Yii::$app->request->getBaseUrl();?>/dangki/dangki/dangnhap" class="login_btn">Đăng nhập</a>


            </nav>
            <?php }?>
        </div>
    </header><!--  end header section  -->
    <?php echo $content;?>
</section><!--  end hero section  -->

<footer style="padding-top: 0px !important;">
    <div class="copyrights wrapper" style="margin-top: 0px !important;">
        Copyright © 2017 By LuatVD
    </div>
</footer><!--  end footer  -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
