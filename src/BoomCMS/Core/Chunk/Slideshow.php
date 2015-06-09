<?php

namespace BoomCMS\Core\Chunk;

use BoomCMS\Core\Editor\Editor as Editor;
use \View as View;

class Slideshow extends Chunk
{
    protected $_default_template = 'circles';

    protected $_type = 'slideshow';

    protected function _show()
    {
        return new View($this->viewPrefix . "slideshow/$this->template", [
            'chunk'    =>    $this->_chunk,
            'title'        =>    $this->_chunk->title,
            'slides'    =>    $this->_chunk->slides(),
            'editor'    =>    Editor::instance(),
        ]);
    }

    public function _showDefault()
    {
        return new View($this->viewPrefix."default/slideshow/$this->template");
    }

    public function hasContent()
    {
        return $this->_chunk->loaded() && count($this->_chunk->slides()) > 0;
    }

    public function slides()
    {
        return $this->_chunk->slides();
    }

    public function thumbnail()
    {
        return $this->_chunk->thumbnail();
    }
}
