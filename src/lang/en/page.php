<?php

use BoomCMS\Database\Models\Page;

return [
    'add-behaviour' => [
        Page::ADD_PAGE_NONE    => 'Inherit',
        Page::ADD_PAGE_CHILD   => 'Add a child page',
        Page::ADD_PAGE_SIBLING => 'Add a sibling page',
    ],
    'history' => [
        'info'      => 'Version information',
        'next'      => 'Next version',
        'prev'      => 'Previous version',
        'edited-at' => 'Edited at',
        'edited-by' => 'Edited by',
        'status'    => 'Status',
        'initial'   => 'Initial version',
    ],
    'diff' => [
        'created'  => 'Created',
        'title'    => 'Title',
        'template' => 'Template',
        'chunk'    => [
            'text'      => 'Text',
            'asset'     => 'Asset',
            'library'   => 'Asset library',
            'location'  => 'Location',
            'timestamp' => 'Date / time',
            'calendar'  => 'Calendar',
            'slideshow' => 'Slideshow',
            'linkset'   => 'Linkset',
            'html'      => 'HTML block',
        ],
        'embargochanged'  => 'Embargo changed',
        'embargoed'       => 'Embargo set',
        'published'       => 'Published',
        'approvalrequest' => 'Request approval',
        'restoredversion' => 'Restored',
    ],
    'visible'   => 'Visible',
    'invisible' => 'Invisible',
    'urls'      => [
        'move' => [
            'heading'         => 'Move URL',
            'primary'         => 'This URL is the primary URL for its page. If you move this URL its current page may become inaccessible.',
            'deleted-warning' => 'This URL is assigned to a page which has been deleted.',
            'deleted'         => '(deleted)',
            'current'         => 'Current Page',
            'new'             => 'New Page',
        ],
    ],
    'status' => [
        'published'        => 'Published',
        'draft'            => 'Draft',
        'pending approval' => 'Pending Approval',
        'embargoed'        => 'Embargoed',
    ],
];
