<?php namespace spec\NukaCode\Menu;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MenuSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Menu\Menu');
    }

    function it_sets_the_name()
    {
        $this->setName('testname')->shouldReturnAnInstanceOf('\NukaCode\Menu\Menu');

        $this->name->shouldBe('testname');
    }

    function it_sets_default_name()
    {
        $this->beConstructedWith('testdefault');

        $this->name->shouldBe('testdefault');
    }

    function it_creates_a_link_and_returns_link_object()
    {
        $this->addLink('name')
            ->shouldReturnAnInstanceOf('\NukaCode\Menu\Link');
    }

    function it_creates_a_link_and_checks_name()
    {
        $link = $this->addLink('name');

        $link->name->shouldBe('name');
    }

    function it_creates_a_link_and_checks_default_position()
    {
        $link = $this->addLink('name');

        $link->position->shouldBe(1000);
    }

    function it_creates_a_link_and_checks_position()
    {
        $link = $this->addLink('name', 1001);

        $link->position->shouldBe(1001);
    }

    function it_creates_a_drop_down_and_returns_link_object()
    {
        $this->addDropDown('name')
             ->shouldReturnAnInstanceOf('\NukaCode\Menu\DropDown');
    }

    function it_creates_a_drop_down_and_checks_name()
    {
        $link = $this->addDropDown('name');

        $link->name->shouldBe('name');
    }

    function it_creates_a_drop_down_and_checks_default_position()
    {
        $link = $this->addDropDown('name');

        $link->position->shouldBe(1000);
    }

    function it_creates_a_drop_down_and_checks_position()
    {
        $link = $this->addDropDown('name', 1001);

        $link->position->shouldBe(1001);
    }
}