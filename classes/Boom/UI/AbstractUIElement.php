<?php

namespace Boom\UI;

abstract class AbstractUIElement
{
    public function __toString()
    {
        return (string) $this->render();
    }

    abstract public function render();
}