<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
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

    function it_test_get_dropdown()
    {
        $this->dropdown('slug', 'name', function ($link) {
        });

        $this->getDropDown('slug', function ($link) {
        });
    }

    function it_test_get_dropdown_exception()
    {
        $this->shouldThrow('\Exception')->during('getDropDown', ['test', function ($link) {
        }]);
    }
}
