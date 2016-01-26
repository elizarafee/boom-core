<?php

namespace BoomCMS\Http\Controllers\Page;

use BoomCMS\Database\Models\Page;
use BoomCMS\Database\Models\Site;
use BoomCMS\Events\PageWasCreated;
use BoomCMS\Http\Controllers\Controller;
use BoomCMS\Jobs\CreatePage;
use Illuminate\Support\Facades\Event;

class PageController extends Controller
{
    protected $viewPrefix = 'boomcms::editor.page.';

    public function postAdd(Site $site, Page $page)
    {
        $this->authorize('add', $page);

        $parent = $page->getAddPageParent();
        $newPage = $this->dispatch(new CreatePage(auth()->user(), $site, $parent));

        Event::fire(new PageWasCreated($newPage, $page));

        return [
            'url' => (string) $newPage->url(),
            'id'  => $newPage->getId(),
        ];
    }

    public function postDiscard(Page $page)
    {
        $this->authorize('edit', $page);
        $page->deleteDrafts();
    }
}
