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
     * Parent menu object
     *
     * @var Menu
     */
    public $menu;

    /**
     * @var
     */
    public $slug;

    /**
     * @var The|null
     */
    public $name;


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

    public function isDropDown()
    {
        return true;
    }

    public function hasLinks()
    {
        if (count($this->links) > 0) {
            return true;
        }

        return false;
    }
}