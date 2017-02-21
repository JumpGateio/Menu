<?php

if (! function_exists('menu')) {
    /**
     * Return a menu object.
     *
     * @param string|null $menuName
     *
     * @return mixed
     */
    function menu($menuName = null)
    {
        if (! is_null($menuName)) {
            return (new \JumpGate\Menu\Container)->getMenu($menuName);
        }

        return new \JumpGate\Menu\Container;
    }
}
