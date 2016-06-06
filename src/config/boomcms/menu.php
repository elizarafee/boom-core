<?php

return [
    'pages' => [
        'url'      => route('page-manager'),
        'role'     => 'managePages',
        'icon'     => 'sitemap',
    ],
    'approvals' => [
        'url'      => '/boomcms/approvals',
        'role'     => 'manageApprovals',
        'icon'     => 'thumbs-o-up',
    ],
    'templates' => [
        'url'      => route('template-manager'),
        'role'     => 'manageTemplates',
        'icon'     => 'file-o',
    ],
    'assets' => [
        'url'      => route('asset-manager'),
        'role'     => 'manageAssets',
        'icon'     => 'picture-o',
    ],
    'people' => [
        'url'      => route('people-manager'),
        'role'     => 'managePeople',
        'icon'     => 'users',
    ],
    'settings' => [
        'url'      => '/boomcms/settings',
        'role'     => 'manageSettings',
        'icon'     => 'cog',
    ],
];
