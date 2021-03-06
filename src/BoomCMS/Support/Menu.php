<?php

namespace BoomCMS\Support;

use BoomCMS\Support\Facades\Router;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;

abstract class Menu
{
    public static function items()
    {
        $items = Config::get('boomcms.menu');

        foreach ($items as $key => $item) {
            if (isset($item['role']) && Gate::denies($item['role'], Router::getActiveSite())) {
                unset($items[$key]);
                continue;
            }

            $items[$key]['title'] = isset($item['title']) ? $item['title'] : Lang::get('boomcms::menu.'.$key);
        }

        usort($items, function ($a, $b) {
            if ($a['title'] === $b['title']) {
                return 0;
            }

            return ($a['title'] < $b['title']) ? -1 : 1;
        });

        return $items;
    }
}
