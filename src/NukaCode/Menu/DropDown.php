<?php
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
     * The next auto assigned position
     * Used if no position is supplied
     *
     * @var int
     */
    public $autoAssignedPosition = 1000;

    /**
     * Add a link to the drop down
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

        $this->items[] = $link;

        return $link;
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

    public function end()
    {
        // Order drop down links
        $this->orderLinks();

        parent::end();
    }

    /**
     * Re order links using position.
     *
     * @return void
     */
    private function orderLinks()
    {
        foreach ($this->items as $linkKey => $linkValue) {
            if ($linkValue->position) {
                $this->items[$linkValue->position] = $linkValue;
                unset($this->items[$linkKey]);
            }
        }

        ksort($this->items);
    }

    /**
     * Count the number of items
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Get the items for this object
     *
     * @return array
     */
    protected function getChildren()
    {
        return array_fetch($this->items, 'url');
    }

    protected function getDefaultPosition($position = null)
    {
        if ($position == null) {
            $position = $this->autoAssignedPosition;
        }

        $this->autoAssignedPosition += 1000;

        return $position;
    }
} 