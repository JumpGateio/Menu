<?php namespace spec\NukaCode\Menu;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DropDownSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('linkName');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Menu\DropDown');
    }

    function it_checks_count()
    {
        $this->count()->shouldBe(0);
    }
}