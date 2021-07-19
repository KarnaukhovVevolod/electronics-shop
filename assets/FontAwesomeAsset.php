<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\assets;

/**
 * Description of FontAwesomeAsset
 *
 * @author Seva
 */
class FontAwesomeAsset extends \yii\web\AssetBundle {
    //put your code here
    public $sourcePath = '@bower/font-awesome';
    public $css = [
        'css/font-awesome.min.css',
    ];
}
