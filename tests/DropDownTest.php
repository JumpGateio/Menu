<?php

namespace Tests;

use JumpGate\Menu\DropDown;
use PHPUnit\Framework\TestCase;

class DropDownTest extends TestCase
{
    /**
     * @var \JumpGate\Menu\DropDown
     */
    protected $dropDown;

    public function setUp()
    {
        parent::setUp();

        $this->dropDown = new DropDown();
    }

    /** @test */
    public function it_checks_is_dropdown()
    {
        $this->assertTrue($this->dropDown->isDropDown());
    }

    /** @test */
    public function it_checks_has_links_method()
    {
        $this->dropDown->links[] = 'one';

        $this->assertTrue($this->dropDown->hasLinks());
    }

    /** @test */
    public function it_checks_has_links_method_no_links()
    {
        $this->assertFalse($this->dropDown->hasLinks());
    }

    /** @test */
    public function it_checks_active_parentage()
    {
        $this->assertTrue($this->dropDown->activeParentage());
    }

    /** @test */
    public function it_disables_active_parentage()
    {
        $this->dropDown->disableActiveParentage();

        $this->assertFalse($this->dropDown->activeParentage());
    }
}
