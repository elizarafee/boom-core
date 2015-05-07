<?php

namespace BoomCMS\Core\Controllers\CMS;

use Boom\Page;
use Boom\Controller\Controller;

class Approvals extends Controller
{
    public function before()
    {
        parent::before();

        $this->authorization('manage_approvals');
    }

    public function index()
    {
        $this->template = new View('boom/approvals/index', [
            'pages' => $this->_get_pages_awaiting_approval(),
        ]);
    }

    protected function _get_pages_awaiting_approval()
    {
        $finder = new Page\Finder();
        $finder->addFilter(new Page\Finder\Filter\PendingApproval());

        return $finder->findAll();
    }
}