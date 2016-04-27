<?php

namespace yeesoft\lightbox;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Lightbox extends Widget {

    /**
     * Array of items for displaying. Available options:
     * 
     * - image - [required] url of the original image
     * - thumbnail - [required] url of the thumbnail image
     * - title - [optional] caption of the image
     * - group - [optional] group of the image set
     * 
     * @var array
     */
    public $items = [];
            
    /**
     * The link tag options in terms of name-value pairs. These will be rendered as
     * the attributes of the resulting tag.
     * 
     * @var array 
     */
    public $options = [];
    
    /**
     * The image tag options in terms of name-value pairs. These will be rendered as
     * the attributes of the resulting tag.
     * 
     * @var array 
     */
    public $imageOptions = ['class' => 'thumbnail pull-left'];


    public function init() {
        LightboxAsset::register($this->getView());
    }

    public function run() {
        $content = '';
        
        foreach ($this->items as $item) {
            if (!isset($item['thumbnail']) || !isset($item['image'])) {
                continue;
            }

            $options = [
                'data-title' => isset($item['title']) ? $item['title'] : '',
            ];

            if (isset($item['group'])) {
                $options['data-lightbox'] = $item['group'];
            } else {
                $options['data-lightbox'] = 'image-' . uniqid();
            }
            
            $options = ArrayHelper::merge($options, $this->options);
            $image = Html::img($item['thumbnail'], $this->imageOptions);
            $content .= Html::a($image, $item['image'], $options);
            
        }
        
        return $content;
    }

}