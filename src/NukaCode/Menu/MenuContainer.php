<?php
namespace NukaCode\Menu;

use NukaCode\Core\Database\Collection;

class MenuContainer extends Collection {

    public function getMenu($menuName)
    {
        return $this->items['menuName'];
    }

    public function add($menu)
    {
        $this->push($menu);
    }
} 