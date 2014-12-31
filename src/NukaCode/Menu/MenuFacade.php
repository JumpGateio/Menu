<?php namespace NukaCode\Menu;

use Illuminate\Support\Facades\Facade;

/**
 * Class MenuFacade
 *
 * @package NukaCode\Menu
 */
class MenuFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'menu';
    }

}
