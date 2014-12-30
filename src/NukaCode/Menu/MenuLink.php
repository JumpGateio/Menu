<?php
namespace NukaCode\Menu;


class MenuLink {

    protected $menu;

    public  $name;

    protected  $route;

    public  $url;

    public  $position;

    public  $icon;

    public  $restricted = false;

    public  $options    = [];

    public  $active     = false;

    function __construct($menu)
    {
        $this->menu = $menu;
    }

    public function setRoute($route)
    {
        // set prams
        $this->route = $route;

        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    public function setOptions($options)
    {
        array_merge($this->options, $options);

        return $this;
    }

    public function setFilter(\Closure $filter)
    {
        if ($filter() == false) {
            $this->restricted = true;
        }

        return $this;
    }

    public function setActive()
    {
        $this->active = true;

        return $this;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function end()
    {
        $this->updateUrl();

        // set active here

        return $this->menu;
    }

    private function updateUrl()
    {
        if ($this->route) {
            $this->url = \URL::route($this->route, [], false);
        }
    }
} 