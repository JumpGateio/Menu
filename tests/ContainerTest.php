<?php

namespace Tests;

use JumpGate\Menu\Container;
use JumpGate\Menu\DropDown;
use JumpGate\Menu\Link;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    /**
     * @var \JumpGate\Menu\Container
     */
    protected $menu;

    public function setUp()
    {
        parent::setUp();

        $this->menu = new Container();
    }

    /** @test */
    public function it_adds_a_menu()
    {
        $menu = $this->menu->getMenu('menuName');

        $this->assertInstanceOf('\Jumpgate\Menu\Menu', $menu);
    }

    /** @test */
    public function it_checks_if_menu_exists_returns_false()
    {
        $this->assertFalse($this->menu->exists('menuName'));
    }

    /** @test */
    public function it_checks_if_menu_exists_returns_true()
    {
        $menu = $this->menu->getMenu('menuName');

        $this->assertInstanceOf('\Jumpgate\Menu\Menu', $menu);
        $this->assertTrue($this->menu->exists('menuName'));
    }

    /** @test */
    public function it_checks_if_has_links_return_true()
    {
        $this->menu->getMenu('menuName')
                   ->link('slug', function (Link $link) {
                       //
                   });

        $this->assertTrue($this->menu->hasLinks('menuName'));
    }

    /** @test */
    public function it_checks_if_has_links_return_false()
    {
        $menu = $this->menu->getMenu('menuName');

        $this->assertInstanceOf('\Jumpgate\Menu\Menu', $menu);
        $this->assertFalse($this->menu->hasLinks('menuName'));
    }

    /** @test */
    public function it_checks_set_active()
    {
        $this->menu->setActive('slug');

        $this->assertEquals('slug', $this->menu->getActive());
    }

    /** @test */
    public function it_checks_if_get_menu_returns_the_existing_menu()
    {
        $this->menu->getMenu('menuName')
                   ->link('slug', function (Link $link) {
                       //
                   });

        $this->assertCount(1, $this->menu->getMenu('menuName')->links);
    }

    /**
     * @test
     *
     * @expectedException Exception
     * @expectedExceptionMessage Menu test not found.
     */
    public function it_throws_an_exception_if_render_cant_find_the_menu()
    {
        $this->menu->render('test');
    }

    /** @test */
    public function it_can_render_a_menu()
    {
        $this->menu->getMenu('test')
                   ->link('slug', function (Link $link) {
                       //
                   });

        $this->assertInstanceOf('\Jumpgate\Menu\Menu', $this->menu->render('test'));
    }

    /** @test */
    public function it_sets_active_items()
    {
        $this->menu->getMenu('test')
                   ->link('slug', function (Link $link) {
                       //
                   });

        $this->menu->setActive('slug');

        $menu = $this->menu->render('test');

        $this->assertTrue($menu->links->first()->active);
    }

    /** @test */
    public function it_sets_active_items_in_dropdown()
    {
        $this->menu->getMenu('test')
                   ->dropdown('slug', 'name', function (DropDown $dropdown) {
                       $dropdown->link('slug2', function (Link $link) {
                           //
                       });
                   });

        $this->menu->setActive('slug2');

        $menu = $this->menu->render('test');

        $this->assertTrue($menu->links->first()->active);
        $this->assertTrue($menu->links->first()->links->first()->active);
    }

    /** @test */
    public function it_sets_active_items_in_dropdown_without_parentage()
    {
        $this->menu->getMenu('test')
                   ->dropdown('slug', 'name', function (DropDown $dropdown) {
                       $dropdown->disableActiveParentage();

                       $dropdown->link('slug2', function (Link $link) {
                           //
                       });
                   });

        $this->menu->setActive('slug2');

        $menu = $this->menu->render('test');

        $this->assertFalse($menu->links->first()->active);
        $this->assertTrue($menu->links->first()->links->first()->active);
    }

    /** @test */
    public function it_tests_insert_before_link()
    {
        $menu = $this->menu->getMenu('test');

        $menu->link('slug', function (Link $link) {
            //
        });

        $menu->link('slug2', function (Link $link) {
            $link->insertBefore('slug');
        });

        $this->assertEquals('slug2', $menu->links->first()->slug);
    }

    /** @test */
    public function it_tests_insert_before_dropdown()
    {
        $menu = $this->menu->getMenu('test');

        $menu->dropdown('slug', 'name', function (DropDown $dropdown) {
            $dropdown->link('slug2', function (Link $link) {
                //
            });
        });

        $menu->link('slug3', function ($link) {
            $link->insertBefore('slug2');
        });

        $this->assertEquals('slug3', $menu->links->first()->links->first()->slug);
    }

    /** @test */
    public function it_tests_insert_after_link()
    {
        $menu = $this->menu->getMenu('test');

        $menu->link('slug', function (Link $link) {
            //
        });

        $menu->link('slug2', function (Link $link) {
            //
        });

        $menu->link('slug3', function (Link $link) {
            //
        });

        $menu->link('slug4', function (Link $link) {
            $link->insertAfter('slug2');
        });

        $this->assertEquals('slug4', $menu->links->get(2)->slug);
    }

    /** @test */
    public function it_tests_insert_after_dropdown()
    {
        $menu = $this->menu->getMenu('test');

        $menu->dropdown('slug', 'name', function (DropDown $dropdown) {
            $dropdown->link('slug2', function (Link $link) {
                //
            });
            $dropdown->link('slug3', function (Link $link) {
                //
            });
            $dropdown->link('slug4', function (Link $link) {
                //
            });
        });

        $menu->link('slug5', function (Link $link) {
            $link->insertAfter('slug2');
        });

        $this->assertEquals('slug5', $menu->links->first()->links->get(1)->slug);
    }
}
