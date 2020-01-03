<?php

namespace JumpGate\Menu;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Collection;
use JumpGate\Menu\Traits\Activate;
use JumpGate\Menu\Traits\Insertable;
use JumpGate\Menu\Traits\Linkable;

/**
 * Class DropDown
 *
 * @package JumpGate\Menu
 */
class DropDown implements Jsonable
{
    use Activate, Insertable, Linkable;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var bool
     */
    public $activateWithLinks = true;

    /**
     * Construct a menu
     *
     * @param $dropDownName The name of the drop down
     */
    public function __construct($dropDownName = null)
    {
        $this->links = new Collection();

        if (isset($dropDownName)) {
            $this->name = $dropDownName;
        }
    }

    /**
     * Check if the current object is a drop down
     *
     * @return bool
     */
    public function isDropDown()
    {
        return true;
    }

    /**
     * Check if the dropdown has links
     *
     * @return bool
     */
    public function hasLinks()
    {
        return (count($this->links) > 0);
    }

    /**
     * This stops the drop down from becoming active
     * because a child link is active.
     */
    public function disableActiveParentage()
    {
        $this->activateWithLinks = false;
    }

    /**
     * Check if the drop down should become active along
     * with it's links.
     */
    public function activeParentage()
    {
        return $this->activateWithLinks;
    }

    /**
     * Convert dropdown to JSON.
     *
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        $properties = get_object_vars($this);
        unset($properties['menu']);

        if (isset($properties['links'])) {
            $properties['links'] = json_decode($properties['links']->toJson());
        }

        return json_encode($properties);
    }
}
