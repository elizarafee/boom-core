<?php

namespace BoomCMS\Core\TextFilter;

class Commander implements Filter
{
    protected $_filters = [];

    public function addFilter(Filter $filter)
    {
        $this->_filters[] = $filter;

        return $this;
    }

    public function filterText($text)
    {
        foreach ($this->_filters as $filter) {
            $text = $filter->filterText($text);
        }

        return $text;
    }
}
