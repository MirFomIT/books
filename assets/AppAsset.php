<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/carousel.min.css',
        'css/carousel.css',
        'css/slider.css',
        'css/pecita.css',
        'css/mobilemenu.css',
        'css/jquery.jscrollpane.css',
        'css/site.css',
    ];
    public $js = [
        'js/carousel.js',
        'js/ckeditor.js',
        'js/index.js',
        'js/script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
