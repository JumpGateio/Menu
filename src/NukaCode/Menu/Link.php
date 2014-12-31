<?php
namespace NukaCode\Menu;


/**
 * Class MenuLink
 *
 * @package NukaCode\Menu
 */
class Link {

    /**
     * Parent menu object
     * @var
     */
    protected $menu;

    /**
     * Name of the link
     * @var
     */
    public  $name;

    /**
     * Link route.
     * @var
     */
    protected  $route;

    /**
     * Link url.
     * @var
     */
    public  $url;

    /**
     * Position to display the link
     * @var
     */
    public  $position;

    /**
     * Icon to use for this link
     * @var
     */
    public  $icon;

    /**
     * If true then this object will be removed from the menu.
     * @var bool
     */
    public  $restricted = false;

    /**
     * Additional options for links
     * @var array
     */
    public  $options    = [];

    /**
     * Is the link active.
     * @var bool
     */
    public  $active     = false;

    /**
     * @param $menu
     */
    function __construct($menu)
    {
        $this->menu = $menu;
    }

    /**
     * Set the laravel route for this link.
     * Routes will be converted to uri.
     *
     * @param $route
     *
     * @return $this
     */
    public function setRoute($route)
    {
        // set prams
        $this->route = $route;

        return $this;
    }

    /**
     * Manually set the url for this link.
     *
     * @param $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the name of this link.
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

    /**
     * Set the position of this link. Links are ordered ascending.
     *
     * @param $position
     *
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Add an icon to this link.
     *
     * @param $icon
     *
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Add options to this link. Can be used as href attributes.
     * @param $options
     *
     * @return $this
     */
    public function setOptions($options)
    {
        array_merge($this->options, $options);

        return $this;
    }

    /**
     * Set the link filter. If the closure returns false
     * then this object will not be returned in the menu.
     *
     * @param callable $filter
     *
     * @return $this
     */
    public function setFilter(\Closure $filter)
    {
        if ($filter() == false) {
            $this->restricted = true;
        }

        return $this;
    }

    /**
     * Set this link as active.
     *
     * @return $this
     */
    public function setActive()
    {
        $this->active = true;

        return $this;
    }

    /**
     * Check if the link is active or not.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Finish adding the object and return to the parent.
     *
     * @return mixed
     */
    public function end()
    {
        $this->updateUrl();

        // set active here

        return $this->menu;
    }

    /**
     * Convert routes to uris
     */
    private function updateUrl()
    {
        if ($this->route) {
            $this->url = \URL::route($this->route, [], false);
        }
    }
} 