<?php namespace NukaCode\Menu;

use NukaCode\Menu\Traits\Activate;
use NukaCode\Menu\Traits\Insertable;

/**
 * Class Link
 *
 * @package NukaCode\Menu
 */
class Link {
    use Insertable;
    use Activate;

    /**
     * Parent menu object
     *
     * @var Menu
     */
    public $menu;

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
     * Position to display the link
     *
     * @var int
     */
    public $position;

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

    public function isDropDown()
    {
        return false;
    }
}