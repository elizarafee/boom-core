<?php

namespace BoomCMS\Database\Models;

use BoomCMS\Contracts\Models\Page as PageInterface;
use BoomCMS\Contracts\Models\URL as URLInterface;
use BoomCMS\Contracts\SingleSiteInterface;
use BoomCMS\Foundation\Database\Model;
use BoomCMS\Support\Helpers\URL as URLHelper;
use BoomCMS\Support\Traits\SingleSite;
use Illuminate\Support\Facades\URL as URLFacade;
use InvalidArgumentException;

class URL extends Model implements SingleSiteInterface, URLInterface
{
    use SingleSite;

    const ATTR_PAGE_ID = 'page_id';
    const ATTR_LOCATION = 'location';
    const ATTR_IS_PRIMARY = 'is_primary';

    /**
     * @var PageInterface
     */
    protected $page;

    protected $table = 'page_urls';

    protected $casts = [
        self::ATTR_ID         => 'integer',
        self::ATTR_IS_PRIMARY => 'boolean',
        self::ATTR_PAGE_ID    => 'integer',
    ];

    public function __toString()
    {
        $location = $this->getLocation();
        $location = (substr($location, 0) === '/') ? $location : '/'.$location;

        $url = URLFacade::to($location);

        return ($location === '/') ? $url.'/' : $url;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->{self::ATTR_LOCATION};
    }

    /**
     * @return PageInterface
     */
    public function getPage()
    {
        if ($this->page === null) {
            $this->page = $this->belongsTo(Page::class, 'page_id')->withTrashed()->first();
        }

        return $this->page;
    }

    /**
     * @return int
     */
    public function getPageId()
    {
        return $this->{self::ATTR_PAGE_ID};
    }

    /**
     * @param Page $page
     *
     * @return bool
     */
    public function isForPage(PageInterface $page)
    {
        return $this->getPageId() === $page->getId();
    }

    /**
     * @return bool
     */
    public function isPrimary()
    {
        return $this->{self::ATTR_IS_PRIMARY} === true;
    }

    /**
     * Determine whether this URL matches a given URL.
     *
     * @param string $location
     *
     * @return bool
     */
    public function matches($location)
    {
        return trim($this->getLocation(), '/') === ltrim($location, '/');
    }

    /**
     * Get the URL using a given scheme.
     *
     * @param string $scheme
     *
     * @return string
     */
    public function scheme($scheme)
    {
        return str_replace('http', $scheme, (string) $this);
    }

    /**
     * @param bool $primary
     *
     * @throws InvalidArgumentException
     *
     * @return $this
     */
    public function setPrimary($primary)
    {
        if (!is_bool($primary)) {
            throw new InvalidArgumentException(__CLASS__.'::'.__METHOD__.' must only be called with a boolean argument');
        }

        $this->{self::ATTR_IS_PRIMARY} = $primary;

        return $this;
    }

    /**
     * @param string $value
     */
    public function setLocationAttribute($value)
    {
        $this->attributes[self::ATTR_LOCATION] = URLHelper::sanitise($value);
    }

    /**
     * @param int $pageId
     *
     * @return $this
     */
    public function setPageId($pageId)
    {
        $this->{self::ATTR_PAGE_ID} = $pageId;

        return $this;
    }
}
