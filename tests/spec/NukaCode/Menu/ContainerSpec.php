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
}