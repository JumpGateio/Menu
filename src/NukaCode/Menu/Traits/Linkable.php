<?php namespace NukaCode\Menu\Traits;

use NukaCode\Menu\Link;
use NukaCode\Menu\DropDown;

/**
 * Class Linkable
 *
 * @package NukaCode\Menu\Traits
 */
trait Linkable {

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
        $dropDown = new DropDown();
        $dropDown->name = $name;
        $dropDown->slug = $this->snakeName($slug);
        $dropDown->menu = $this->getMenu();

        call_user_func($callback, $dropDown);

        if (!$dropDown->insert) {
            $this->links[] = $dropDown;
        }
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
        $link = new Link();
        $link->slug = $this->snakeName($slug);
        $link->menu = $this->getMenu();

        call_user_func($callback, $link);

        if (!$link->insert) {
            $this->links[] = $link;
        }
    }

    /**
     * Get the menu this linkable belongs to
     *
     * @return $this
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
} 