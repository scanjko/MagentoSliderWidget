<?php

namespace Pixel\WidgetExt\Block\Adminhtml\Widget\Parameter;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Factory;

class Textarea extends Template
{
    protected $_elementFactory;

    public function __construct(Context $context, Factory $elementFactory, array $data = [])
    {
        $this->_elementFactory = $elementFactory;

        parent::__construct($context, $data);
    }

    public function prepareElementHtml(AbstractElement $element)
    {
        $textareaElement = $this->_elementFactory->create('textarea', ['data' => $element->getData()]);
        $textareaElement->setId($element->getId());
        $textareaElement->setForm($element->getForm());

        if ($element->getRequired()) {
            $textareaElement->addClass('required-entry');
        }

        $element->setValue('');
        $element->setData('after_element_html', $textareaElement->getElementHtml());

        return $element;
    }
}
