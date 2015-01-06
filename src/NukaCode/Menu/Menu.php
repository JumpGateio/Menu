<?php
namespace NukaCode\Menu;

/**
 * Class Menu
 *
 * @package NukaCode\Menu
 */
class Menu {
    use LinkableTrait;

    /**
     * Name of this menu
     *
     * @var
     */
    public $name;

    /**
     * The menu links
     *
     * @var array
     */
    public $items = [];

    /**
     * The next auto assigned position
     * Used if no position is supplied
     *
     * @var int
     */
    public $autoAssignedPosition = 1000;

    /**
     * Not sure if i need this.
     *
     * @param $menuName
     */
    public function __construct($menuName = null)
    {
        if (isset($menuName)) {
            $this->name = $menuName;
        }
    }

    /**
     * Set the menu name.
     *
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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

        return $this;
    }

    /**
     * Remove any menu with restricted == true
     *
     * @return void
     */
    private function removeRestrictedMenus()
    {
        foreach ($this->items as $linkKey => $linkValue) {
            if ($linkValue->restricted == true) {
                unset($this->items[$linkKey]);
            }
        }
    }

    /**
     * Re order links using position.
     *
     * @return void
     */
    private function orderLinks()
    {
        foreach ($this->items as $linkKey => $linkValue) {
            if ($linkValue->position) {
                $this->items[$linkValue->position] = $linkValue;
                unset($this->items[$linkKey]);
            }
        }

        ksort($this->items);
    }

    private function getDefaultPosition($position = null)
    {
        if ($position == null) {
            $position = $this->autoAssignedPosition;
        }

        $this->autoAssignedPosition += 1000;

        return $position;
    }
} 