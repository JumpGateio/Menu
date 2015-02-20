<?php namespace nukacode\menu\tests;


use NukaCode\Menu\Menu;

class LinkableTraitTest extends \PHPUnit_Framework_TestCase {

    private function setupMenu()
    {
        $menu = new Menu('TestMenu');

        return $menu;
    }

    public function testCreateMenuObject()
    {
        $menu = $this->setupMenu();

        $menu->addLink('testLink', 1001)
             ->setActive()
             ->end();

        $this->assertEquals('testLink', $menu->items[0]->name);
        $this->assertEquals(1001, $menu->items[0]->position);
    }


} 