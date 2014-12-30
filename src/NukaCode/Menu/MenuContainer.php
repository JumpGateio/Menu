<?php
namespace NukaCode\Menu;

use NukaCode\Core\Database\Collection;

class MenuContainer extends Collection {

    public function getMenu($menuName)
    {
        return $this->get(e(snake_case($menuName)));
//        return $this->getWhere('name', '=', $menuName);
    }

    public function add($menuName)
    {
        return $this->items[e(snake_case($menuName))] = new Menu($menuName);

//            $this->put(e(snake_case($menuName)), ;;
    }

    public function this()
    {
        return $this;
    }
} 