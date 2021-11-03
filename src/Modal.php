<?php
/**
 * @package yii2-widget-turbo
 * @author Simon Karlen <simi.albi@gmail.com>
 */

namespace simialbi\yii2\turbo;

use yii\base\InvalidConfigException;
use yii\base\Widget;

class Modal extends Widget
{
    /**
     * @var string The PHP modal class to use
     */
    public string $modalClass = '\yii\bootstrap4\Modal';

    /**
     * @var array the HTML attributes for the widget container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public array $options = [];

    /**
     * {@inheritDoc}
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!class_exists($this->modalClass)) {
            throw new InvalidConfigException("The class '{$this->modalClass}' does not exists.");
        }
        if (!isset($this->options['id'])) {
            throw new InvalidConfigException("The 'id' attribute must be set!");
        }
    }

    /**
     * {@inheritDoc}
     */
    public function run(): string
    {
        ob_start();
        call_user_func([$this->modalClass, 'begin'], $this->options);
        echo Frame::widget([
            'options' => [
                'id' => $this->options['id'] . '-frame'
            ],
            'lazyLoading' => true
        ]);
        call_user_func([$this->modalClass, 'end']);

        return ob_get_clean();
    }
}
