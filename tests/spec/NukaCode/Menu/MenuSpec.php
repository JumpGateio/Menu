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
        $this->name = 'testname';

        $this->name->shouldBe('testname');
    }

    function it_sets_default_name()
    {
        $this->beConstructedWith('testdefault');

        $this->name->shouldBe('testdefault');
    }
}