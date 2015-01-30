<?php

namespace Boom\Chunk;

use Boom\Editor\Editor as Editor;
use Boom\TextFilter\Commander as TextFilter;
use Boom\TextFilter\Filter as Filter;
use \Kohana as Kohana;
use \View as View;

class Text extends \Boom\Chunk
{
    protected $_type = 'text';

    private $defaultText;

    protected function _add_html($text)
    {
        switch ($this->_slotname) {
            case 'standfirst':
                return "<p class=\"standfirst\">$text</p>";
            case 'bodycopy':
                return "<div class=\"content\">$text</div>";
            case 'bodycopy2':
                return "<div class=\"content-secondary\">$text</div>";
            default:
                return "<p>$text</p>";
        }
    }

    /**
	 *
	 * @uses Model_Chunk_Text::unmunge()
	 * @uses Chunk_Text::embed_video()
	 */
    protected function _show()
    {
        return $this->showText($this->text());
    }

    protected function _show_default()
    {
        return $this->showText($this->defaultText());
    }

    public function defaultText()
    {
        if ($this->defaultText !== null) {
            return $this->defaultText;
        }

        $text = Kohana::message('chunks', $this->_slotname);
        $text || $text = Kohana::message('chunks', 'text');

        return $text;
    }

    public function get_paragraphs($offset = 0, $length = null)
    {
        preg_match_all('|<p>(.*?)</p>|', $this->_chunk->text, $matches, PREG_PATTERN_ORDER);

        return $matches[1];
    }

    public function hasContent()
    {
        return trim($this->_chunk->text) != null;
    }

    /**
     * Sets the default text that should be shown in the editor if the text chunk has no content.
     *
     * This is useful as a way of setting some text which describes to editors what the text chunk is intended to be used for.
     *
     * @param string $text
     * @return \Boom\Chunk\Text
     */
    public function setDefaultText($text)
    {
        $this->defaultText = $text;

        return $this;
    }

    private function showText($text)
    {
        // If no template has been set then add the default HTML tags for this slotname.
        if ($this->_template === null) {
            return $this->_add_html($text);
        } else {
            return new View($this->viewDirectory."text/$this->_template", [
                'text' => $text,
                'chunk' => $this->_chunk
            ]);
        }
    }

    public function text()
    {
        if (Editor::instance()->isEnabled()) {
            $commander = new TextFilter();
            $commander
                ->addFilter(new Filter\UnmungeAssetEmbeds())
                ->addFilter(new Filter\UnmungeInternalLinks());

            $text = $commander->filterText($this->_chunk->text);
        } else {
            $text = $this->_chunk->site_text;
        }

        return $text;
    }
}
