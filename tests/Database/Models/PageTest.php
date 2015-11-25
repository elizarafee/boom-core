<?php

namespace BoomCMS\Tests\Database\Models;

use BoomCMS\Core\Chunk\Text;
use BoomCMS\Database\Models\Asset;
use BoomCMS\Database\Models\Page;
use BoomCMS\Support\Facades\Chunk;

class PageTest extends AbstractModelTestCase
{
    protected $model = Page::class;

    public function testGetChildOrderingPolicy()
    {
        $values = [
            Page::ORDER_TITLE                           => ['title', 'desc'], // Default is descending
            Page::ORDER_TITLE | Page::ORDER_ASC         => ['title', 'asc'],
            Page::ORDER_TITLE | Page::ORDER_DESC        => ['title', 'desc'],
            Page::ORDER_VISIBLE_FROM | Page::ORDER_ASC  => ['visible_from', 'asc'],
            Page::ORDER_VISIBLE_FROM | Page::ORDER_DESC => ['visible_from', 'desc'],
            Page::ORDER_SEQUENCE | Page::ORDER_ASC      => ['sequence', 'asc'],
            Page::ORDER_SEQUENCE | Page::ORDER_DESC     => ['sequence', 'desc'],
            0                                           => ['sequence', 'desc'],
        ];

        foreach ($values as $order => $expected) {
            $page = new Page([Page::ATTR_CHILD_ORDERING_POLICY => $order]);

            $this->assertEquals($expected, $page->getChildOrderingPolicy());
        }
    }

    public function testHasFeatureImage()
    {
        $page = new Page([Page::ATTR_FEATURE_IMAGE => 1]);
        $this->assertTrue($page->hasFeatureImage());

        $page = new Page();
        $this->assertFalse($page->hasFeatureImage());
    }

    public function testGetFeatureImageId()
    {
        $page = new Page([Page::ATTR_FEATURE_IMAGE => 1]);
        $this->assertEquals(1, $page->getFeatureImageId());

        $page = new Page();
        $this->assertNull($page->getFeatureImageId());
    }

    public function testGetFeatureImage()
    {
        $page = $this->getMock(Page::class, ['hasOne']);
        $page->expects($this->once())->method('hasOne')->with($this->equalTo(Asset::class));

        $page->getFeatureImage();
    }

    public function testGetDescriptionReturnsDescriptionIfSet()
    {
        $page = new Page([Page::ATTR_DESCRIPTION => 'test']);
        $this->assertEquals('test', $page->getDescription());
    }

    public function testGetDescriptionUsesPageStandfirstAsFallback()
    {
        $page = new Page();

        Chunk::shouldReceive('get')
            ->once()
            ->with('text', 'standfirst', $page)
            ->andReturn(new Text($page, ['text' => 'test standfirst', 'site_text' => 'test standfirst'], 'standfirst', false));

        $this->assertEquals('test standfirst', $page->getDescription());
    }

    public function testGetDescriptionRemovesHtml()
    {
        $page = new Page([Page::ATTR_DESCRIPTION => '<p>description</p>']);
        $this->assertEquals('description', $page->getDescription());
    }

    public function testSetAndGetChildOrderingPolicy()
    {
        $values = [
            ['title', 'asc'],
            ['title', 'desc'],
            ['visible_from', 'asc'],
            ['visible_from', 'desc'],
            ['sequence', 'asc'],
            ['sequence', 'desc'],
        ];

        foreach ($values as $v) {
            list($column, $direction) = $v;

            $page = new Page();
            $page->setChildOrderingPolicy($column, $direction);
            list($newCol, $newDirection) = $page->getChildOrderingPolicy();

            $this->assertEquals($column, $newCol);
            $this->assertEquals($direction, $newDirection);
        }
    }

    public function testSetParentPageCantBeChildOfItself()
    {
        $page = new Page([Page::ATTR_ID => 1, Page::ATTR_PARENT => 2]);
        $page->setParent($page);

        $this->assertEquals(2, $page->getParentId());
    }

    public function testHasChildrenReturnsFalseIfChildCountIs0()
    {
        $page = $this->getMockBuilder(Page::class)
            ->setMethods(['countChildren'])
            ->setConstructorArgs([[]])
            ->getMock();

        $page
            ->expects($this->once())
            ->method('countChildren')
            ->will($this->returnValue(0));

        $this->assertFalse($page->hasChildren());
    }

    public function testHasChildrenReturnsTrueIfChildCountGreaterThan0()
    {
        $page = $this->getMockBuilder(Page::class)
            ->setMethods(['countChildren'])
            ->setConstructorArgs([[]])
            ->getMock();

        $page
           ->expects($this->once())
            ->method('countChildren')
            ->will($this->returnValue(1));

        $this->assertTrue($page->hasChildren());
    }

    public function testIsParentOf()
    {
        $parent = $this->validPage();

        $child = new Page([Page::ATTR_PARENT => $parent->getId()]);
        $notAChild = new Page([Page::ATTR_PARENT => 2]);

        $this->assertTrue($parent->isParentOf($child), 'Child');
        $this->assertFalse($parent->isParentOf($notAChild), 'Not child');
    }

    public function testSetSequence()
    {
        $page = new Page();

        $this->assertEquals($page, $page->setSequence(2));
        $this->assertEquals(2, $page->getManualOrderPosition());
    }
}