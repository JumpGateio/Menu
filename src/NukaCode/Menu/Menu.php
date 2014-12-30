<?php
namespace NukaCode\Menu;


class Menu {

    public  $name;

    public  $items     = [];

    function __construct($menuName)
    {
        if (isset($menuName)) {
            $this->name = $menuName;
        }
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function addLink($name)
    {
        $link = new MenuLink($this);
        $link->setName($name);
        
        return $this->items[] = $link;
    }

    public function addDropDown($name)
    {
        $dropDown = new MenuDropDown($this);
        $dropDown->setName($name);

        return $this->items[] = $dropDown;
    }

    public function end()
    {
        // Remove all menus that failed filters
        $this->removeRestrictedMenus();

        // Order Links
        $this->orderLinks();

        return $this;
    }

    private function removeRestrictedMenus()
    {
        foreach ($this->items as $linkKey => $linkValue) {
            if ($linkValue->restricted == true) {
                unset($this->items[$linkKey]);
            }
        }
    }

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