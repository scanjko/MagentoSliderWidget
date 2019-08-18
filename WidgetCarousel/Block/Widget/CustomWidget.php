<?php

namespace Pixel\WidgetCarousel\Block\Widget;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class CustomWidget extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('widget/custom_widget.phtml');

    }

    public function getCarouselClass()
    {
        return $this->getData('carousel_css_class');
    }

    public function getCarouselImage()
    {
        $backgroundImage = $this->getData('carousel_image');
        if (!$backgroundImage) {
            return '';
        }

        return $backgroundImage;
    }

    public function getCarouselTitle()
    {
        return $this->getData('carousel_title');
    }

    public function getCarouselDescription()
    {
        return $this->getData('carousel_description');
    }

    public function getCarouselLink()
    {
        return $this->getData('carousel_link');
    }
    public function addBlank(){
        if($this->getData('addBlank') == 'no-blank')
            return 'no-blank';
        elseif($this->getData('addBlank') == 'add-blank')
            return 'add-blank';

    }

}