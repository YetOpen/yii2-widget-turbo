<?php
/**
 * @package yii2-widget-turbo
 * @author Simon Karlen <simi.albi@gmail.com>
 */

namespace yiiunit\extensions\turbo;

use simialbi\yii2\turbo\Frame;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Url;

class FrameTest extends TestCase
{
    public function testNoIdException()
    {
        $this->expectExceptionObject(new InvalidConfigException("The 'id' attribute must be set!"));

        Frame::widget();
    }

    public function testDefaultRendering()
    {
        ob_start();
        Frame::begin([
            'options' => [
                'id' => 'messages'
            ]
        ]);
        echo "\n";
        echo Html::a('Show all expanded messages in this frame', '/messages/expanded');
        echo "\n";
        Frame::end();

        $actual = ob_get_clean();

        $expected = <<<HTML
<turbo-frame id="messages">
<a href="/messages/expanded">Show all expanded messages in this frame</a>
</turbo-frame>
HTML;

        $this->assertEquals($expected, $actual);
    }

    public function testOptions()
    {
        ob_start();
        Frame::begin([
            'options' => [
                'id' => 'messages'
            ],
            'autoscroll' => true,
            'disabled' => true
        ]);
        echo "\n";
        echo Html::a('Show all expanded messages in this frame', '/messages/expanded');
        echo "\n";
        Frame::end();

        $actual = ob_get_clean();

        $expected = <<<HTML
<turbo-frame id="messages" disabled autoscroll>
<a href="/messages/expanded">Show all expanded messages in this frame</a>
</turbo-frame>
HTML;

        $this->assertEquals($expected, $actual);
    }

    public function testSrcAndLazyLoading()
    {
        $actual = Frame::widget([
            'options' => [
                'id' => 'messages',
                'src' => Url::to('/messages/view')
            ],
            'lazyLoading' => true
        ]);

        $expected = '<turbo-frame id="messages" src="/messages/view" loading="lazy"></turbo-frame>';

        $this->assertEquals($expected, $actual);
    }
}
