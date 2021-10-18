# Hotwire Turbo implementation for yii2-framework

[![Latest Stable Version](https://poser.pugx.org/simialbi/yii2-widget-turbo/v/stable?format=flat-square)](https://packagist.org/packages/simialbi/yii2-widget-turbo)
[![Total Downloads](https://poser.pugx.org/simialbi/yii2-widget-turbo/downloads?format=flat-square)](https://packagist.org/packages/simialbi/yii2-widget-turbo)
[![License](https://poser.pugx.org/simialbi/yii2-widget-turbo/license?format=flat-square)](https://packagist.org/packages/simialbi/yii2-widget-turbo)
[![build](https://github.com/simialbi/yii2-widget-turbo/actions/workflows/build.yml/badge.svg)](https://github.com/simialbi/yii2-widget-turbo/actions/workflows/build.yml)

This repository is work in progress. The Frame widget can already be used.

## Resources
 * [Yii Framework](https://www.yiiframework.com)
 * [Hotwired turbo](https://turbo.hotwired.dev)

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require --prefer-dist simialbi/yii2-widget-turbo
```

or add

```
"simialbi/yii2-widget-turbo": "^1.0.0"
```

to the `require` section of your `composer.json`.

## Usage

## Example Usage

### Basic Frame
```php
<?php
Frame::begin([
    'options' => [
        'id' => 'example-frame'
    ]
]);
?>
    <a href="/messages/expanded">
        Show all expanded messages in this frame.
    </a>
    
    <form action="/messages">
        Show response from this form within this frame.
    </form>
<?php
Frame::end();
```

### Eager loaded frame
```php
<?php
Frame::begin([
    'options' => [
        'id' => 'example-frame',
        'src' => Url::to(['/messages'])
    ]
]);
?>
    Content will be replaced when /messages has been loaded.
<?php
Frame::end();
```

### Lazy loaded frame
```php
<?php
Frame::begin([
    'options' => [
        'id' => 'example-frame',
        'src' => Url::to(['/messages'])
    ],
    'lazyLoading' => true
]);
?>
    Content will be replaced when the frame becomes visible and /messages has been loaded.
<?php
Frame::end();
```


## License

**yii2-widget-turbo** is released under MIT license. See bundled [LICENSE](LICENSE) for details.
