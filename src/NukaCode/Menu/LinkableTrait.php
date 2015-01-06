<?php namespace NukaCode\Menu;


/**
 * Class LinkableTrait
 *
 * @package NukaCode\Menu
 */
Trait LinkableTrait {

    /**
     * Add a link to the menu.
     *
     * @param string       $name
     * @param integer|null $position
     *
     * @return Link
     */
    public function addLink($name, $position = null)
    {
        $link = new Link($this);
        $link->setName($name);
        $link->setPosition($this->getDefaultPosition($position));

        return $this->items[] = $link;
    }

    /**
     * Sets all the link details at once
     *
     * @param string       $name
     * @param string       $route
     * @param integer|null $position
     * @param string       $icon
     * @param array        $options
     *
     * @return $this
     */
    public function quickLink($name, $route, $position = null, $icon = '', $options = [])
    {
        $link = $this->addLink($name, $position);
        $link->setRoute($route);
        $link->setIcon($icon);
        $link->setOptions($options);

        $link->end();

        return $this;
    }

    /**
     * Add a drop down to the menu.
     *
     * @param string       $name
     * @param integer|null $position
     *
     * @return DropDown
     */
    public function addDropDown($name, $position = null)
    {
        $dropDown = new DropDown($this);
        $dropDown->setName($name);
        $dropDown->setPosition($this->getDefaultPosition($position));

        return $this->items[] = $dropDown;
    }

    /**
     * Sets all the drop down details at once
     *
     * @param string       $name
     * @param string       $route
     * @param integer|null $position
     * @param string       $icon
     * @param array        $options
     *
     * @return DropDown
     */
    public function quickDropDown($name, $route, $position = null, $icon = '', $options = [])
    {
        $dropDown = $this->addDropDown($name, $position);
        $dropDown->setRoute($route);
        $dropDown->setIcon($icon);
        $dropDown->setOptions($options);

        return $dropDown;
    }

} 