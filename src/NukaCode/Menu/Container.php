<?php namespace NukaCode\Menu;

use Illuminate\Support\Collection;


/**
 * Class Container
 *
 * @package NukaCode\Menu
 */
class Container extends Collection {

    /**
     * The slug to set to active during render
     *
     * @var string
     */
    private $active;

    /**
     * Get a menu you have created.
     *
     * @param $menuName
     *
     * @return mixed
     */
    public function getMenu($menuName)
    {
        $menu = $this->getMenuObject($menuName);
        if ($menu) {
            return $menu;
        } else {
            return $this->add($menuName);
        }
    }

    /**
     * Add a new menu.
     *
     * @param $menuName
     *
     * @return Menu
     */
    private function add($menuName)
    {
        return $this->items[] = new Menu($this->snakeName($menuName));
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
        if ($this->getMenuObject($menuName)) {
            return true;
        }

        return false;
    }

    /**
     * Check if a menu is empty
     *
     * @param $menuName
     *
     * @return bool
     */
    public function hasLinks($menuName)
    {
        if (count($this->getMenuObject($menuName)->links) > 0) {
            return true;
        }

        return false;
    }

    /**
     * Update the active and order values and then return the object.
     *
     * @param $menuName
     *
     * @return Menu
     * @throws \Exception
     */
    public function render($menuName)
    {
        // We set active at the last possible moment.
        $this->updateActive();

        $menu = $this->getMenuObject($menuName);

        if (!$menu) {
            throw new \Exception("Menu {$menuName} not found.");
        }

        return $menu;
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

    /**
     * Get the menu object
     *
     * @param $menuName
     *
     * @return mixed|null
     */
    private function getMenuObject($menuName)
    {
        return $this->where('name', $this->snakeName($menuName))->first();
    }

    /**
     * Set the active link by slug.
     *
     * @param $slug
     */
    public function setActive($slug)
    {
        $this->active = $slug;
    }

    /**
     * Use the active param and set the link to active
     *
     * REFACTOR!
     */
    private function updateActive()
    {
        foreach ($this->items as $item) {
            if (isset($item->links)) {
                foreach ($item->links as $link) {
                    if ($link->slug == $this->active) {
                        $link->setActive(true);
                    }

                    if (isset($link->links)) {
                        foreach ($link->links as $subLink) {
                            if ($subLink->slug == $this->active) {
                                $link->setActive(true);
                                $subLink->setActive(true);
                            }
                        }
                    }
                }
            }
        }
    }
} 