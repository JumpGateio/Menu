<?php
namespace NukaCode\Menu;

/**
 * Class Menu
 *
 * @package NukaCode\Menu
 */
class Menu {

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
     * Add a link to the menu.
     *
     * @param              $name
     * @param integer|null $position
     *
     * @return Link
     */
    public function addLink($name, $position = null)
    {
        $link = new Link($this);
        $link->setName($name);
        $link->setPosition($this->getDefaultPosition($position));

        return $this->items[] = $link;
    }

    /**
     * Sets all the link details at once
     *
     * @param              $name
     * @param              $route
     * @param integer|null $position
     * @param string       $icon
     * @param array        $options
     *
     * @return $this
     */
    public function quickLink($name, $route, $position = null, $icon = '', $options = [])
    {
        $link = $this->addLink($name, $position);
        $link->setRoute($route);
        $link->setIcon($icon);
        $link->setOptions($options);

        $link->end();

        return $this;
    }

    /**
     * Add a drop down to the menu.
     *
     * @param      $name
     * @param null $position
     *
     * @return DropDown
     */
    public function addDropDown($name, $position = null)
    {
        $dropDown = new DropDown($this);
        $dropDown->setName($name);
        $dropDown->setPosition($this->getDefaultPosition($position));

        return $this->items[] = $dropDown;
    }

    /**
     * Sets all the drop down details at once
     *
     * @param        $name
     * @param        $route
     * @param int    $position
     * @param string $icon
     * @param array  $options
     *
     * @return DropDown
     */
    public function quickDropDown($name, $route, $position = null, $icon = '', $options = [])
    {
        $dropDown = $this->addDropDown($name, $position);
        $dropDown->setRoute($route);
        $dropDown->setIcon($icon);
        $dropDown->setOptions($options);

        return $dropDown;
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