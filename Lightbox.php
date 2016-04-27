<?php

namespace yeesoft\lightbox;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

class Lightbox extends Widget {

    /**
     * Array of items for displaying. Available options:
     * 
     * - image - [required] url of the original image
     * - thumb - [required] url of the thumbnail image
     * - title - [optional] caption of the image
     * - group - [optional] group of the image set
     * 
     * @var array
     */
    public $items = [];
                
    /**
     * Lightbox options in terms of name-value pairs. You can use this if 
     * you want to change any of the default Lightbox options. List of all
     * available options: http://lokeshdhakar.com/projects/lightbox2/#options
     * 
     * @var array 
     */
    public $options = [];
    
    /**
     * The link tag options in terms of name-value pairs. These will be rendered as
     * the attributes of the resulting tag.
     * 
     * @var array 
     */
    public $linkOptions = [];
    
    /**
     * The image tag options in terms of name-value pairs. These will be rendered as
     * the attributes of the resulting tag.
     * 
     * @var array 
     */
    public $imageOptions = ['class' => 'thumbnail pull-left'];

    public function init() {
        LightboxAsset::register($this->getView());
        
        if(!empty($this->options)){
            $options = json_encode($this->options);
            $this->getView()->registerJs("lightbox.option({$options})", View::POS_END);
        }
    }

    public function run() {
        $content = '';
        
        foreach ($this->items as $item) {
            if (!isset($item['thumb']) || !isset($item['image'])) {
                continue;
            }

            $linkOptions['data-title'] = isset($item['title']) ? $item['title'] : '';

            if (isset($item['group'])) {
                $linkOptions['data-lightbox'] = $item['group'];
            } else {
                $linkOptions['data-lightbox'] = 'image-' . uniqid();
            }
            
            $linkOptions = ArrayHelper::merge($linkOptions, $this->linkOptions);
            $image = Html::img($item['thumb'], $this->imageOptions);
            $content .= Html::a($image, $item['image'], $linkOptions);
            
        }
        
        return $content;
    }

}