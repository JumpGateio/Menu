<?php namespace NukaCode\Menu\Traits;


/**
 * Class Activate
 *
 * @package NukaCode\Menu\Traits
 */
trait Activate {

    /**
     * Is the link active.
     *
     * @var bool
     */
    public $active;

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
}