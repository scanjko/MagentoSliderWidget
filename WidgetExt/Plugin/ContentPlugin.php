<?php

namespace Pixel\WidgetExt\Plugin;

use Magento\Cms\Block\Adminhtml\Wysiwyg\Images\Content;

class ContentPlugin
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGetOnInsertUrl(Content $subject, $result)
    {
        return $subject->getUrl('cms/*/onInsert', [
            'render_as_relative_uri' => $subject->getRequest()->getParam('render_as_relative_uri', 0)
        ]);
    }
}
