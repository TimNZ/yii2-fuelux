<?php

namespace xemware\fuelux;

use yii\web\AssetBundle;

class FueluxAsset extends AssetBundle
{
    public $sourcePath = '@vendor/xemware/yii2-fuelux/assets';

    public $css = [
        'fuelex/css/fuelux.min.css'
    ];

    public $js = [
        'fuelex/js/fuelux.min.js'
    ];

} 