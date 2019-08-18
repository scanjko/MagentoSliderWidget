<?php

namespace Pixel\WidgetExt\Helper;

class Images extends \Magento\Cms\Helper\Wysiwyg\Images
{
    public function getRelativeUri($filename)
    {
        $fullUrl = $this->getCurrentUrl() . $filename;

        return substr($fullUrl, strpos($fullUrl, 'wysiwyg/'));
    }
}
