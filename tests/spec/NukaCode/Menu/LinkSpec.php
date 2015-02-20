<?php namespace spec\NukaCode\Menu;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LinkSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('linkName');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Menu\Link');
    }

    function it_checks_set_url()
    {
        $this->setUrl('testUrl');
        $this->url->shouldBe('testUrl');
    }

    function it_checks_set_icon()
    {
        $this->setIcon('testIcon');
        $this->icon->shouldBe('testIcon');
    }

    function it_checks_set_active()
    {
        $this->setActive(true);
        $this->shouldBeActive();
    }

    function it_checks_not_active()
    {
        $this->setActive(false);
        $this->shouldNotBeActive();
    }

    function it_checks_set_filter_is_false()
    {
        $this->setFilter(function(){return true;});
        $this->shouldNotBeRestricted();
    }

    function it_checks_set_filter_is_true()
    {
        $this->setFilter(function(){return false;});
        $this->shouldBeRestricted();
    }

    function it_checks_set_route()
    {
        $this->setRoute('test.route');
        $this->route->shouldBe('test.route');
    }

    function it_checks_set_options()
    {
        $this->setOptions(['data' => 'dataOne']);

        $this->options->shouldContain('dataOne');
        $this->options->shouldHaveKey('data');
    }

    function it_checks_count()
    {
        $this->count()->shouldBe(0);
    }
}