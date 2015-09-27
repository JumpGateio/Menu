<?php namespace NukaCode\Menu;

use Illuminate\Support\Collection;
use NukaCode\Menu\Traits\Insertable;
use NukaCode\Menu\Traits\Linkable;

/**
 * Class Menu
 *
 * @package NukaCode\Menu
 */
class Menu {
    use Linkable;
    use Insertable;

    /**
     * Name of this menu
     *
     * @var
     */
    public $name;

    /**
     * Construct a menu
     *
     * @param $menuName
     */
    public function __construct($menuName = null)
    {
        $this->links = new Collection();

        if (isset($menuName)) {
            $this->name = $menuName;
        }
    }
}