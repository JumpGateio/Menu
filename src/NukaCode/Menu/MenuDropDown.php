<?php
/**
 * Created by PhpStorm.
 * User: riddles
 * Date: 12/22/14
 * Time: 3:30 PM
 */

namespace NukaCode\Menu;


class MenuDropDown extends MenuLink{

    public $dropDownOptions = [];

    public function addLink($name)
    {
        $link = new MenuLink($this);
        $link->setName($name);

        $this->dropDownOptions[] = $link;

        return $link;
    }
} 