<?php

namespace JumpGate\Menu\Traits;

use JumpGate\Menu\Link;
use JumpGate\Menu\DropDown;

/**
 * Class Linkable
 *
 * @package JumpGate\Menu\Traits
 */
trait Linkable
{
    /**
     * Parent menu object
     *
     * @var Menu
     */
    public $menu;

    /**
     * The menu links
     *
     * @var \Illuminate\Support\Collection
     */
    public $links = 'links NEEDS TO BE SET TO A COLLECTION';

    /**
     * @param $slug
     * @param $name
     * @param $callback
     */
    public function dropDown($slug, $name, $callback)
    {
        $dropDown       = new DropDown();
        $dropDown->name = $name;

        $this->insertMenuObject($slug, $callback, $dropDown);
    }

    /**
     * @param $slug
     * @param $callback
     *
     * @throws \Exception
     */
    public function getDropDown($slug, $callback)
    {
        $dropDown = $this->links->where('slug', $this->snakeName($slug))->first();

        if ($dropDown) {
            call_user_func($callback, $dropDown);
        } else {
            throw new \Exception("Drop down {$slug} not found");
        }
    }

    /**
     * @param $slug
     * @param $callback
     */
    public function link($slug, $callback)
    {
        $this->insertMenuObject($slug, $callback, (new Link));
    }

    /**
     * Get the menu this linkable belongs to
     *
     * @return Menu
     */
    private function getMenu()
    {
        if (isset($this->menu)) {
            return $this->menu;
        }

        return $this;
    }

    /**
     * Sanitize the menus names for safe use in array keys.
     *
     * @param $name
     *
     * @return string
     */
    public function snakeName($name)
    {
        return e(snake_case($name));
    }

    /**
     * Insert an object into the menu
     *
     * @param $slug
     * @param $callback
     * @param $object
     */
    private function insertMenuObject($slug, $callback, $object)
    {
        $object->slug = $this->snakeName($slug);
        $object->menu = $this->getMenu();

        call_user_func($callback, $object);

        if (! $object->insert) {
            $this->links[] = $object;
        }
    }
} 
