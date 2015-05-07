<?php

namespace BoomCMS\Core\Controllers\Page;

class Json extends Controller\Page
{
    public function before()
    {
        parent::before();

        $this->response->headers('Content-Type', static::JSON_RESPONSE_MIME);
    }
}