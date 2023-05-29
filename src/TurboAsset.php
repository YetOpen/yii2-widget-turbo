<?php
/**
 * @package yii2-widget-turbo
 * @author Simon Karlen <simi.albi@gmail.com>
 */

namespace simialbi\yii2\turbo;

use simialbi\yii2\web\AssetBundle;
use yii\web\View;

/**
 * The turbo asset bundle
 */
class TurboAsset extends AssetBundle
{
    public $sourcePath = '@npm/hotwired--turbo/dist';

    /**
     * @inheritdoc
     */
    public $js = [
        'turbo.es2017-umd.js'
    ];

    /**
     * @inheritdoc
     */
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];

    /**
     * @inheritdoc
     */
    public $publishOptions = [
        'only' => [
            'turbo.es2017-umd.js'
        ]
    ];
}
