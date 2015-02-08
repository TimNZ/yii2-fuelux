<?php

namespace xemware\fuelux;

use yii\web\AssetBundle;

class FueluxAsset extends AssetBundle
{
    public $sourcePath = '@vendor/xemware/yii2-fuelux/assets';

    public $css = [
        'fuelux/css/fuelux.min.css'
    ];

    public $js = [
        'fuelux/js/fuelux.min.js'
    ];

} 