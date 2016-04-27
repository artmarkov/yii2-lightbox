# yii2-lightbox

## Lightbox Widget for Yii 2

This module is a wrapper for Lightbox2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist yeesoft/yii2-lightbox "*"
```

or add

```json
"yeesoft/yii2-lightbox": "*"
```

to the require section of your `composer.json` file.

Usage
------------
Once the extension is installed, simply add widget to your page as follows:

```php
use yeesoft\lightbox\Lightbox;

echo Lightbox::widget([
    'options' => [
        'fadeDuration' => '2000',
        'albumLabel' => "Image %1 of %2",
    ],
    'linkOptions' => ['class' => 'pull-left'],
    'imageOptions' => ['class' => 'thumbnail'],
    'items' => [
        [
            'thumbnail' => '/images/image01-120x90.jpg',
            'image' => '/images/image01.jpg',
            'title' => 'Image 1',
            'group' => 'image-set1',
        ],
        [
            'thumbnail' => '/images/image02-120x90.jpg',
            'image' => '/images/image02.jpg',
            'title' => 'Image 2',
            'group' => 'image-set1',
        ],
    ],
]);
```

