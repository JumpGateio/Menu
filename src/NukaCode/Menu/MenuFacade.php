<?php namespace NukaCode\Menu;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * Class MenuFacade
 *
 * @package NukaCode\Menu
 */
class MenuFacade extends LaravelFacade {

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
