<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath =  '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/layui.css',
        'css/bootstrap.css',
        'css/iview.css',
        'css/fonts/ionicons.ttf'
    ];

    public $js = [
        'js/layui.js',
        'js/vue.min.js',
        'js/iview.min.js',
        'js/bootstrap.js',
        'js/iview.js'
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
