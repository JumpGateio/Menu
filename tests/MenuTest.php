<?php
namespace nukacode\menu\tests;


use NukaCode\Menu\Menu;

class MenuTest extends \PHPUnit_Framework_TestCase {

    public function testCreateMenuObject()
    {
        $menuWithName    = new Menu('testMenu');
        $menuWithoutName = new Menu();

        $this->assertEquals('testMenu', $menuWithName->name);
        $this->assertNull($menuWithoutName->name);
    }

    public function testMenuSetName()
    {
        $menu = new Menu();
        $menu->setName('testMenu');

        $this->assertEquals('testMenu', $menu->name);
    }

} 