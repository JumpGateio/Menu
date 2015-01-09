<?php namespace NukaCode\Menu;

/**
 * Class Menu
 *
 * @package NukaCode\Menu
 */
class Menu {
    use LinkableTrait;

    /**
     * Name of this menu
     *
     * @var
     */
    public $name;

    /**
     * Not sure if i need this.
     *
     * @param $menuName
     */
    public function __construct($menuName = null)
    {
        if (isset($menuName)) {
            $this->name = $menuName;
        }
    }

    /**
     * Set the menu name.
     *
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
} 