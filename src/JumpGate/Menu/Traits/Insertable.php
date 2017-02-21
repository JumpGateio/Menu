<?php

namespace JumpGate\Menu\Traits;

/**
 * Class Insertable
 *
 * @package JumpGate\Menu\Traits
 */
trait Insertable
{
    /**
     * Let the add method know not to append this item as it was spliced into the array.
     *
     * @var bool
     */
    public $insert = false;

    /**
     * Insert this item after another item in the menu
     *
     * @param $slug
     */
    public function insertAfter($slug)
    {
        $this->insertObject($slug, true);
    }

    /**
     * Insert this item before another item in the menu
     *
     * @param $slug
     */
    public function insertBefore($slug)
    {
        $this->insertObject($slug);
    }

    /**
     * @param $slug
     * @param $after
     */
    private function insertObject($slug, $after = false)
    {
        $this->insert = true;

        foreach ($this->menu->links as $linkKey => $link) {
            if ($link->isDropdown()) {
                foreach ($link->links as $subLinkKey => $subLink) {
                    if ($subLink->slug == $slug) {
                        if ($after) {
                            $link->links->splice($subLinkKey + 1, 0, [$this]);
                        } else {
                            $link->links->splice($subLinkKey, 0, [$this]);
                        }
                    }
                }
            } else {
                if ($link->slug == $slug) {
                    if ($after) {
                        $this->menu->links->splice($linkKey + 1, 0, [$this]);
                    } else {
                        $this->menu->links->splice($linkKey, 0, [$this]);
                    }
                }
            }
        }
    }
}
