<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BlogAsset extends AssetBundle
{

    public $basePath = '@webroot/web/';
    public $baseUrl = '@web/web/';
    public $css = [
        'css/blog/screen.css',
    ];
    public $js = [
    'js/blog/ace.js',
    'js/blog/markdown.js',
    ];
    public $depends = [
       'yii\web\JqueryAsset',
    ];
}
