<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
?>
<!DOCTYPE html>
<? AppAsset::register($this);?>
<?php $this->beginPage(); ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody() ?>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">
            NTM_lab
        </div>
        <ul class="layui-nav layui-layout-left">
<!--            <li class="layui-nav-item"><a href="/index.php?r=coupon/coupon/lists">M1</a></li>-->
<!--            <li class="layui-nav-item layui-this"><a href="/index.php?r=coupon/coupon/add">M2</a></li>-->
<!--            <li class="layui-nav-item "><a href="">用户</a></li>-->
<!--            <li class="layui-nav-item">-->
<!--                <a href="javascript:;">其它系统</a>-->
<!--                <dl class="layui-nav-child">-->
<!--                    <dd><a href="">邮件管理</a></dd>-->
<!--                    <dd><a href="">消息管理</a></dd>-->
<!--                    <dd><a href="">授权管理</a></dd>-->
<!--                </dl>-->
<!--            </li>-->
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    <?=$this->context->user?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="/index.php?r=site/logout">logout</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item ">
                    <a class="" href="javascript:;">Coupon</a>
                    <dl class="layui-nav-child">
                        <dd ><a href="/coupon/coupon/lists">coupon列表</a></dd>
                        <dd><a href="/coupon/coupon/add">coupon添加</a></dd></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;">sass</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/sass/sass/lists"">sass列表</a></dd>
                        <dd><a href="/sass/sass/add"">sass添加</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;">信息更改</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/user/lists">用户列表</a></dd>
                        <dd><a href="">安全设置</a></dd>
                    </dl>
                </li>
<!--                <li class="layui-nav-item"><a href="">云市场</a></li>-->
<!--                <li class="layui-nav-item"><a href="">发布商品</a></li>-->
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <div style="padding: 15px;"><?=$content?></div>
    </div>

    <div class="layui-footer">
        powered by eric@yii.com
    </div>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
