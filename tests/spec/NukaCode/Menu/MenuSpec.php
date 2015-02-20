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

        $this->shouldHavePropertyWith([
            'name' => 'name',
            'data' => 'testname'
        ]);
    }

    function it_sets_default_name()
    {
        $this->beConstructedWith('testdefault');

        $this->shouldHavePropertyWith([
            'name' => 'name',
            'data' => 'testdefault'
        ]);
    }

    function it_creates_a_link_and_returns_link_object()
    {
        $this->addLink('name')
            ->shouldReturnAnInstanceOf('\NukaCode\Menu\Link');
    }

    function it_creates_a_link_and_checks_name()
    {
        $this->addLink('name')
             ->shouldHavePropertyWith([
                 'name' => 'name',
                 'data' => 'name'
             ]);
    }

    function it_creates_a_link_and_checks_default_position()
    {
        $this->addLink('name')
            ->shouldHavePropertyWith([
                'name' => 'position',
                'data' => 1000
            ]);
    }

    function it_creates_a_link_and_checks_position()
    {
        $this->addLink('name', 1001)
             ->shouldHavePropertyWith([
                 'name' => 'position',
                 'data' => 1001
             ]);
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