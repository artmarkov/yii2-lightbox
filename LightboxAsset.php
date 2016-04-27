<?php

namespace yeesoft\lightbox;

use yii\web\AssetBundle;

class LightboxAsset extends AssetBundle {

    public $sourcePath = '@bower/lightbox2';

    public $js = [
        'dist/js/lightbox.min.js',
    ];

    public $css = [
        'dist/css/lightbox.min.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}

