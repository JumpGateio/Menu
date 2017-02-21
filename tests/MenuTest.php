<?php

namespace Tests;

use JumpGate\Menu\DropDown;
use JumpGate\Menu\Menu;
use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
    /**
     * @var \JumpGate\Menu\Menu
     */
    protected $menu;

    public function setUp()
    {
        parent::setUp();

        $this->menu = new Menu();
    }

    /** @test */
    public function it_sets_the_name()
    {
        $this->menu->name = 'testName';

        $this->assertEquals('testName', $this->menu->name);
    }

    /** @test */
    public function it_sets_default_name()
    {
        $menu = new Menu('testDefault');

        $this->assertEquals('testDefault', $menu->name);
    }

    /** @test */
    public function it_test_get_dropdown()
    {
        $this->menu->dropdown('slug', 'name', function (DropDown $dropDown) {
            $dropDown->link('slug2', function () {
                //
            });
        });

        $this->menu->getDropDown('slug', function (DropDown $dropDown) {
            $dropDown->link('slug3', function () {
                //
            });
        });

        $this->assertCount(2, $this->menu->links->first()->links);
    }

    /**
     * @test
     *
     * @expectedException Exception
     * @expectedExceptionMessage Drop down test not found.
     */
    public function it_test_get_dropdown_exception()
    {
        $this->menu->getDropDown('test', function () {
            //
        });
    }
}
