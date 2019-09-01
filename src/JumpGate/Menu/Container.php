<?php

namespace JumpGate\Menu;

use Illuminate\Support\Collection;

/**
 * Class Container
 *
 * @package JumpGate\Menu
 */
class Container extends Collection
{
    /**
     * The slug to set to active during render
     *
     * @var array
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
    public function add($menuName)
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
        return (bool)$this->getMenuObject($menuName);
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
        return (count($this->getMenuObject($menuName)->links) > 0);
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

        if (! $menu) {
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
     * Get the active link by slug.
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the active link by slug.
     *
     * @param $slug
     */
    public function setActive($slug)
    {
        $this->active = explode('::', $slug);
    }

    /**
     * Use the active param and set the link to active
     */
    private function updateActive()
    {
        $this->each(function ($item) {
            if (isset($item->links)) {
                $this->makeActive($item);
            }
        });
    }

    /**
     * Loop through the links and check for active.
     * Sets the item and it's parents as active when told to.
     */
    private function makeActive($item, $parent = null)
    {
        $item->links->each(function ($link) use ($item, $parent) {
            if (in_array($link->slug, $this->active)) {
                $this->makeParentActive($parent);
                $this->makeParentActive($item);

                $link->setActive(true);
            }

            if (isset($link->links)) {
                $this->makeActive($link, $item);
            }
        });
    }

    /**
     * Set the parent item as active if able to do so.
     */
    private function makeParentActive($parent)
    {
        if (! is_null($parent)
            && method_exists($parent, 'activeParentage')
            && $parent->activeParentage()
        ) {
            $parent->setActive(true);
        }
    }
}
