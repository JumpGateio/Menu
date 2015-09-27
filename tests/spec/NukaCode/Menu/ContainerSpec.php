<?php namespace spec\NukaCode\Menu;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContainerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Menu\Container');
    }

    function it_adds_a_menu()
    {
        $this->getMenu('menuName')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');
    }

    function it_checks_if_menu_exists_returns_false()
    {
        $this->exists('menuName')->shouldBe(false);
    }

    function it_checks_if_menu_exists_returns_true()
    {
        $this->getMenu('menuName')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');

        $this->exists('menuName')->shouldBe(true);
    }

    function it_checks_if_has_links_return_true()
    {
        $this->getMenu('menuName')->link('slug', function ($link){});

        $this->hasLinks('menuName')->shouldBe(true);
    }

    function it_checks_if_has_links_return_false()
    {
        $this->getMenu('menuName')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');

        $this->hasLinks('menuName')->shouldBe(false);
    }

    function it_checks_set_active()
    {
        $this->setActive('slug');

        $this->getActive()->shouldBe('slug');
    }

    function it_check_if_get_menu_returns_the_existing_menu()
    {
        $this->getMenu('menuName')->link('slug', function ($link){});

        $this->getMenu('menuName')->links->count()->shouldBe(1);
    }

    function it_checks_render_method_exception()
    {
        $this->shouldThrow('\Exception')->during('render', ['test']);
    }

    function it_checks_render_method()
    {
        $this->getMenu('test')->link('slug', function ($link){});
        $this->render('test')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');
    }

    function it_sets_active_items()
    {
        $this->getMenu('test')->link('slug', function ($link){});

        $this->setActive('slug');

        $this->render('test');
    }

    function it_sets_active_items_in_dropdown()
    {
        $this->getMenu('test')->dropdown('slug', 'name', function ($dropdown){
            $dropdown->link('slug2', function ($link){});
        });

        $this->setActive('slug2');

        $this->render('test');
    }

    function it_tests_insert_before_link()
    {
        $menu = $this->getMenu('test');

        $menu->link('slug', function ($link){
        });

        $menu->link('slug2', function ($link){
            $link->insertBefore('slug');
        });
    }

    function it_tests_insert_before_dropdown()
    {
        $menu = $this->getMenu('test');

        $menu->dropdown('slug', 'name', function ($dropdown){
            $dropdown->link('slug2', function ($link){});
        });

        $menu->link('slug3', function ($link){
            $link->insertBefore('slug2');
        });
    }

    function it_tests_insert_after_link()
    {
        $menu = $this->getMenu('test');

        $menu->link('slug', function ($link){
        });

        $menu->link('slug2', function ($link){
            $link->insertAfter('slug');
        });
    }

    function it_tests_insert_after_dropdown()
    {
        $menu = $this->getMenu('test');

        $menu->dropdown('slug', 'name', function ($dropdown){
            $dropdown->link('slug2', function ($link){});
        });

        $menu->link('slug3', function ($link){
            $link->insertAfter('slug2');
        });
    }
}