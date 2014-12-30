<?php
namespace NukaCode\Menu;

use Illuminate\Support\Collection;

class MenuContainer extends Collection {

    public function getMenu($menuName)
    {
        return $this->get(e(snake_case($menuName)));
    }

    public function add($menuName)
    {
        return $this->items[e(snake_case($menuName))] = new Menu($menuName);
    }
} 