<?php

namespace JumpGate\Menu;

use Illuminate\Support\Collection;
use JumpGate\Menu\Traits\Insertable;
use JumpGate\Menu\Traits\Linkable;

/**
 * Class Menu
 *
 * @package JumpGate\Menu
 */
class Menu
{
    use Linkable, Insertable;

    /**
     * Name of this menu
     *
     * @var string
     */
    public $name;

    /**
     * Construct a menu
     *
     * @param $menuName
     */
    public function __construct($menuName = null)
    {
        $this->links = new Collection();

        if (isset($menuName)) {
            $this->name = $menuName;
        }
    }
}
