<?php namespace NukaCode\Menu;

/**
 * Class DropDown
 *
 * @package NukaCode\Menu
 */
class DropDown extends Link {
    use LinkableTrait;

    /**
     * Count the number of items
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Get the items for this object
     *
     * @return array
     */
    protected function getChildren()
    {
        return array_fetch($this->items, 'url');
    }

    /**
     * Finalize the menu and return it.
     *
     * @return $this
     */
    public function end()
    {
        // Remove all menus that failed filters
        $this->removeRestrictedMenus();

        // Order Links
        $this->orderLinks();

        return $this->menu;
    }
} 