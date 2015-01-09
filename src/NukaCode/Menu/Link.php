<?php namespace NukaCode\Menu;

/**
 * Class Link
 *
 * @package NukaCode\Menu
 */
class Link {

    /**
     * Parent menu object
     *
     * @var Menu
     */
    protected $menu;

    /**
     * Name of the link
     *
     * @var string
     */
    public $name;

    /**
     * Link route.
     *
     * @var string
     */
    protected $route;

    /**
     * Link url.
     *
     * @var string
     */
    public $url;

    /**
     * Position to display the link
     *
     * @var int
     */
    public $position;

    /**
     * Icon to use for this link
     *
     * @var string
     */
    public $icon;

    /**
     * If true then this object will be removed from the menu.
     *
     * @var bool
     */
    public $restricted = false;

    /**
     * Additional options for links
     *
     * @var array
     */
    public $options = [];

    /**
     * Is the link active.
     *
     * @var bool
     */
    public $active;

    /**
     * @param LinkableTrait $menu
     */
    public function __construct($menu)
    {
        $this->menu = $menu;
    }

    /**
     * Set the laravel route for this link.
     * Routes will be converted to uri.
     *
     * @param string $route
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
     * @param string $name
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
     * @param string $icon
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
     *
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
     * @param \Closure $filter
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
     * @param bool $bool
     *
     * @return $this
     */
    public function setActive($bool = true)
    {
        $this->active = $bool;

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
     * @return Menu
     */
    public function end()
    {
        $this->updateUrl();
        $this->checkActive();

        return $this->menu;
    }

    /**
     * Convert routes to uris
     */
    protected function updateUrl()
    {
        if ($this->route) {
            $this->url = \URL::route($this->route, [], false);
        }
    }

    /**
     * Check if we are at the given link
     * If child items exist, check their urls as well
     */
    protected function checkActive()
    {
        if ($this->active == null) {
            $currentUri = \Route::getCurrentRoute()->getUri();

            if ($this->url == $currentUri || in_array($currentUri, $this->getChildren())) {
                $this->setActive();
            } else {
                $this->setActive(false);
            }
        }
    }

    /**
     * Count the number of items
     * Defaults to 0 since links don't have items
     *
     * @return int
     */
    public function count()
    {
        return 0;
    }

    /**
     * Get the items for this object
     * Defaults to empty since links don't have items
     *
     * @return array
     */
    protected function getChildren()
    {
        return [];
    }
} 