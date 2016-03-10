<?php namespace NukaCode\Menu;

use Illuminate\Support\Collection;
use NukaCode\Menu\Traits\Activate;
use NukaCode\Menu\Traits\Insertable;
use NukaCode\Menu\Traits\Linkable;

/**
 * Class DropDown
 *
 * @package NukaCode\Menu
 */
class DropDown {
    use Linkable;
    use Activate;
    use Insertable;

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
    public $activateWithLink = true;

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
        $this->activateWithLink = false;
    }
}
