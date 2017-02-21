<?php

namespace JumpGate\Menu;

use JumpGate\Menu\Traits\Activate;
use JumpGate\Menu\Traits\Insertable;

/**
 * Class Link
 *
 * @package JumpGate\Menu
 */
class Link
{
    use Activate, Insertable;

    /**
     * The link slug
     *
     * @var string
     */
    public $slug;

    /**
     * Name of the link
     *
     * @var string
     */
    public $name;

    /**
     * Link url
     *
     * @var string
     */
    public $url;

    /**
     * Additional options for links
     *
     * @var array
     */
    public $options = [];

    /**
     * Get a menu option
     *
     * @param $name The name of the menu option
     *
     * @return string|bool Return the menu option if it exists or false.
     */
    public function getOption($name)
    {
        if (isset($this->options[$name])) {
            return $this->options[$name];
        }

        return false;
    }

    /**
     * Check if the current object is a drop down
     *
     * @return bool
     */
    public function isDropDown()
    {
        return false;
    }
}
