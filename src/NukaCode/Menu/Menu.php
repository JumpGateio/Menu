<?php
namespace NukaCode\Menu;


use NukaCode\Core\Database\Collection;

class Menu {

    private $builder;

    public  $name;

    public  $links     = [];

    public  $dropDowns = [];

    function __construct(MenuBuilder $menuBuilder)
    {
        $this->builder = $menuBuilder;
//        $this->links     = new Collection();
//        $this->dropDowns = new Collection();
    }

    public function setName($name)
    {
        $this->name = $name;
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
        return $this->builder;
    }


} 