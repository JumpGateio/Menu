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

    function it_checks_is_dropdown()
    {
        $this->isDropDown()->shouldReturn(true);
    }

    function it_checks_has_links_method()
    {
        $this->links[] = 'one';

        $this->hasLinks()->shouldReturn(true);
    }

    function it_checks_has_links_method_no_links()
    {
        $this->hasLinks()->shouldReturn(false);
    }
    
    function it_checks_active_parentage()
    {
        $this->activeParentage()->shouldReturn(true);
    }
    
    function it_disables_active_parentage()
    {
        $this->disableActiveParentage();
        
        $this->activeParentage()->shouldReturn(false);
    }
}
