<?php namespace nukacode\menu\tests;


use NukaCode\Menu\Menu;

class LinkTest extends \PHPUnit_Framework_TestCase {

    private function setupMenu()
    {
        $menu = new Menu('TestMenu');

        return $menu;
    }

    public function testCreateLinkObject()
    {
        $menuWithName    = $this->setupMenu();
        $menuWithoutName = $this->setupMenu();
        $menuWithoutName->setName(null);

        $this->assertEquals('TestMenu', $menuWithName->name);
        $this->assertNull($menuWithoutName->name);
    }

    public function testLinkSetName()
    {
        $menu = $this->setupMenu();
        $menu->setName('testMenu1');

        $this->assertEquals('testMenu1', $menu->name);
    }

    public function testLinkSetPosition()
    {
        $menu = $this->setupMenu();

        $menu->addLink('testLinks')
             ->setPosition(1024)
             ->setActive()
             ->end();

        $this->assertEquals(1024, $menu->items[0]->position);
    }

    public function testSetIcon()
    {
        $menu = $this->setupMenu();

        $menu->addLink('testLink')
             ->setIcon('testIcon')
             ->setActive()
             ->end();

        $this->assertEquals('testIcon', $menu->items[0]->icon);
    }

    public function testSetOptions()
    {
        $menu = $this->setupMenu();
        $menu->addLink('testLink')
             ->setOptions(['one' => 'one'])
             ->setActive()
             ->end();

        $this->assertEquals('one', $menu->items[0]->options['one']);
    }

    public function testSetFilterTrue()
    {
        $menu = $this->setupMenu();

        $menu->addlink('testLink')
             ->setFilter(function () {
                 return true;
             })
             ->setActive()
             ->end();

        $this->assertFalse($menu->items[0]->restricted);
    }

    public function testSetFilterFalse()
    {
        $menu = $this->setupMenu();

        $menu->addlink('testLink')
             ->setFilter(function () {
                 return false;
             })
             ->setActive()
             ->end();

        $this->assertTrue($menu->items[0]->restricted);
    }
}