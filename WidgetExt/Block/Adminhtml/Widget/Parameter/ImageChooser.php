<?php

namespace Pixel\WidgetExt\Block\Adminhtml\Widget\Parameter;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Factory;

class ImageChooser extends Template
{
    protected $_elementFactory;

    public function __construct(Context $context, Factory $elementFactory, array $data = [])
    {
        $this->_elementFactory = $elementFactory;

        parent::__construct($context, $data);
    }

    public function prepareElementHtml(AbstractElement $element)
    {
        $textElement = $this->_elementFactory->create('text', ['data' => $element->getData()]);
        $textElement->setId($element->getId());
        $textElement->setClass('widget-option input-text admin__control-text');
        $textElement->setForm($element->getForm());

        if ($element->getRequired()) {
            $textElement->addClass('required-entry');
        }

        $url = $this->getUrl('cms/wysiwyg_images/index', [
            'target_element_id'      => $element->getId(),
            'render_as_relative_uri' => 1
        ]);

        $button = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button');
        $button->setType('button');
        $button->setLabel('Choose...');
        $button->setOnClick("MediabrowserUtility.openDialog('$url');");

        $element->setValue('');
        $element->setData('after_element_html', $textElement->getElementHtml() . $button->toHtml());

        return $element;
    }
}
