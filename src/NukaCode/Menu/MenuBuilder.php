<?php

namespace NukaCode\Menu;


use NukaCode\Core\Database\Collection;

class MenuBuilder {

    public $menus = [];

    function __construct()
    {
        // should remove the collection dependency
        // for now ill keep it for ease of testing
//        $this->menus = [];
    }


    /**
     * Create a new menu
     *
     * @param $menuName string The name of the menu you are building
     *
     * @return Menu The menu object
     */
    public function createMenu($menuName)
    {
        $menu = new Menu($this);
        $menu->setName($menuName);

        $this->menus[] = $menu;

        return $menu;
    }

} 