<?php

namespace JumpGate\Menu\Traits;

/**
 * Class Activate
 *
 * @package JumpGate\Menu\Traits
 */
trait Activate
{
    /**
     * Is the link active.
     *
     * @var bool
     */
    public $active = false;

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
