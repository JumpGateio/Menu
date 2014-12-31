<?php
/**
 * Created by PhpStorm.
 * User: riddles
 * Date: 12/22/14
 * Time: 3:30 PM
 */

namespace NukaCode\Menu;


/**
 * Class DropDown
 *
 * @package NukaCode\Menu
 */
class DropDown extends Link {

    /**
     * Drop down link items
     *
     * @var array
     */
    public $items = [];

    /**
     * Add a link to the drop down
     *
     * @param $name
     *
     * @return Link
     */
    public function addLink($name)
    {
        $link = new Link($this);
        $link->setName($name);

        $this->items[] = $link;

        return $link;
    }
} 