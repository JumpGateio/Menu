<?php namespace spec\NukaCode\Menu;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MenuContainerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Menu\MenuContainer');
    }

    function it_adds_a_menu()
    {
        $this->add('menuName')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');
    }

    function it_checks_if_menu_exists_returns_false()
    {
        $this->exists('menuName')->shouldBe(false);
    }

    function it_checks_if_menu_exists_returns_true()
    {
        $this->add('menuName')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');

        $this->exists('menuName')->shouldBe(true);
    }

    function it_get_a_menu()
    {
        $this->add('menuName')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');

        $this->getMenu('menuName')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');
    }
}