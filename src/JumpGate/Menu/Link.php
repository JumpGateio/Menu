<?php

namespace JumpGate\Menu;

use Illuminate\Contracts\Support\Jsonable;
use JumpGate\Menu\Traits\Activate;
use JumpGate\Menu\Traits\Insertable;

/**
 * Class Link
 *
 * @package JumpGate\Menu
 */
class Link implements Jsonable
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
     * Parent menu object
     *
     * @var Menu
     */
    public $mennu;

    /**
     * Link url
     *
     * @var string
     */
    public $url;

    /**
     * If true, it will be an inertia, non-reloading link.
     *
     * @var bool
     */
    public $inertia = true;

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

    /**
     * Convert link to JSON.
     * 
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        $properties = get_object_vars($this);
        unset($properties['menu']);

        return json_encode($properties);
    }
}
