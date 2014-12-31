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
    public  $name;

    /**
     * The menu links
     *
     * @var array
     */
    public  $items     = [];

    /**
     * Not sure if i need this.
     *
     * @param $menuName
     */
    function __construct($menuName)
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
     * @param $name
     *
     * @return Link
     */
    public function addLink($name)
    {
        $link = new Link($this);
        $link->setName($name);

        return $this->items[] = $link;
    }

    public function quickLink($name, $route, $position = 999, $icon = '', $options = [])
    {
        $link = $this->addLink($name);
        $link->setRoute($route);
        $link->setPosition($position);
        $link->setIcon($icon);
        $link->setOptions($options);

        $link->end();

        return $this;
    }

    /**
     * Add a dropdown to the menu.
     *
     * @param $name
     *
     * @return DropDown
     */
    public function addDropDown($name)
    {
        $dropDown = new DropDown($this);
        $dropDown->setName($name);

        return $this->items[] = $dropDown;
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
} 