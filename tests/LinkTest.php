<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Menu\Link');
    }

    function it_checks_set_url()
    {
        $this->url = 'testUrl';
        $this->url->shouldBe('testUrl');
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

    function it_checks_set_options()
    {
        $this->options = ['data' => 'dataOne'];

        $this->options->shouldContain('dataOne');
        $this->options->shouldHaveKey('data');
    }

    function it_checks_is_dropdown()
    {
        $this->isDropDown()->shouldReturn(false);
    }

    function it_checks_get_options_method()
    {
        $this->options = ['test' => 'test'];

        $this->getOption('test')->shouldReturn('test');
    }

    function it_checks_get_options_method_invalid_option()
    {
        $this->options = [];

        $this->getOption('test')->shouldReturn(false);
    }
}
