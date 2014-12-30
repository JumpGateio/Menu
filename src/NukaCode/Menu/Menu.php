<?php
namespace NukaCode\Menu;


class Menu {

    public  $name;

    public  $links     = [];

    public  $dropDowns = [];

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

        $this->links[] = $link;

        return $link;
    }

    public function addDropDown($name)
    {
        $dropDown = new MenuDropDown($this);
        $dropDown->setName($name);

        $this->dropDowns[] = $dropDown;

        return $dropDown;
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
        foreach ($this->links as $linkKey => $linkValue) {
            if ($linkValue->restricted == true) {
                unset($this->links[$linkKey]);
            }
        }
    }

    private function orderLinks()
    {
        foreach ($this->links as $linkKey => $linkValue) {
            if ($linkValue->position) {
                $this->links[$linkValue->position] = $linkValue;
                unset($this->links[$linkKey]);
            }
        }

        ksort($this->links);
    }
} 