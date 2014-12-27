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
        return $this;
    }
} 