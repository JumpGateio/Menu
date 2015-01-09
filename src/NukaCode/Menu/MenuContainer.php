<?php namespace NukaCode\Menu;

use Illuminate\Support\Collection;

/**
 * Class MenuContainer
 *
 * @package NukaCode\Menu
 */
class MenuContainer extends Collection {

    /**
     * Get a menu you have created.
     *
     * @param $menuName
     *
     * @return mixed
     */
    public function getMenu($menuName)
    {
        return $this->get($this->snakeName($menuName));
    }

    /**
     * Add a new menu.
     *
     * @param $menuName
     *
     * @return Menu
     */
    public function add($menuName)
    {
        return $this->items[$this->snakeName($menuName)] = new Menu($menuName);
    }

    /**
     * Check if a menu exists.
     *
     * @param $menuName
     *
     * @return bool
     */
    public function exists($menuName)
    {
        return $this->offsetExists($this->snakeName($menuName));
    }

    /**
     * Sanitize the menus names for safe use in array keys.
     *
     * @param $name
     *
     * @return string
     */
    public function snakeName($name)
    {
        return e(snake_case($name));
    }
} 