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
        $this->setUrl('testUrl')
            ->shouldHavePropertyWith([
                'name' => 'url',
                'data' => 'testUrl'
            ]);
    }

    function it_checks_set_icon()
    {
        $this->setIcon('testIcon')
             ->shouldHavePropertyWith([
                 'name' => 'icon',
                 'data' => 'testIcon'
             ]);
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

    function getMatchers()
    {
        return [
            'havePropertyWith' => function ($subject, $key) {
                return ($subject->{$key['name']} == $key['data']);
            }
        ];
    }
}