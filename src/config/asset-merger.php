<?php

return array(
    'load_paths' => array(
        Assets::JAVASCRIPT => array(__DIR__ . '/../media/boom/js/'),
        Assets::STYLESHEET => array(__DIR__.'/../media/boom/css/'),
    ),
    'dev' => Boom\Boom::instance()->getEnvironment()->isDevelopment(),
);