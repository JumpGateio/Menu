<?php

namespace Tests;

use JumpGate\Menu\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    /**
     * @var \JumpGate\Menu\Link
     */
    protected $link;

    public function setUp()
    {
        parent::setUp();

        $this->link = new Link();
    }

    /** @test */
    function it_checks_set_url()
    {
        $this->link->url = 'testUrl';

        $this->assertEquals('testUrl', $this->link->url);
    }

    /** @test */
    function it_checks_set_active()
    {
        $this->link->setActive(true);

        $this->assertTrue($this->link->active);
    }

    /** @test */
    function it_checks_not_active()
    {
        $this->link->setActive(false);

        $this->assertFalse($this->link->active);
    }

    /** @test */
    function it_checks_set_options()
    {
        $this->link->options = ['data' => 'dataOne'];

        $this->assertArrayHasKey('data', $this->link->options);
        $this->assertEquals('data', array_search('dataOne', $this->link->options));
    }

    /** @test */
    function it_checks_is_dropdown()
    {
        $this->assertFalse($this->link->isDropDown());
    }

    /** @test */
    function it_checks_get_options_method()
    {
        $this->link->options = ['test' => 'testValue'];

        $this->assertEquals('testValue', $this->link->getOption('test'));
    }

    /** @test */
    function it_checks_get_options_method_invalid_option()
    {
        $this->link->options = [];

        $this->assertFalse($this->link->getOption('test'));
    }
}
