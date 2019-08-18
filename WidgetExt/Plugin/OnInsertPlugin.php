<?php

namespace Pixel\WidgetExt\Plugin;

use Pixel\WidgetExt\Helper\Images;
use Magento\Cms\Controller\Adminhtml\Wysiwyg\Images\OnInsert;
use Magento\Framework\Controller\Result\RawFactory;

class OnInsertPlugin
{
    protected $_resultRawFactory;
    protected $_imagesHelper;

    public function __construct(RawFactory $resultRawFactory, Images $imagesHelper)
    {
        $this->_resultRawFactory = $resultRawFactory;
        $this->_imagesHelper     = $imagesHelper;
    }

    public function aroundExecute(OnInsert $subject, $proceed)
    {
        $renderAsRelativeUri = $subject->getRequest()->getParam('render_as_relative_uri', 0);
        if ($renderAsRelativeUri) {
            $filename = $subject->getRequest()->getParam('filename');
            $filename = $this->_imagesHelper->idDecode($filename);

            $imageRelativeUri = $this->_imagesHelper->getRelativeUri($filename);

            return $this->_resultRawFactory->create()->setContents($imageRelativeUri);
        }

        return $proceed();
    }
}
