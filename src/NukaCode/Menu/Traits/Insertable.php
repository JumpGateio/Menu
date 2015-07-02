<?php namespace NukaCode\Menu\Traits;

/**
 * Class Insertable
 *
 * @package NukaCode\Menu\Traits
 */
trait Insertable {

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

        $this->insert = true;

        foreach ($this->menu->links as $linkKey => $link) {
            if ($link->isDropdown()) {
                foreach ($link->links as $subLinkKey => $subLink) {
                    if ($subLink->slug == $slug) {
                        $link->links->splice($subLinkKey + 1, 0, [$this]);
                    }

                }
            } else {
                if ($link->slug == $slug) {
                    $this->menu->links->splice($linkKey + 1, 0, [$this]);
                }
            }
        }

    }

    /**
     * Insert this item before another item in the menu
     *
     * @param $slug
     */
    public function insertBefore($slug)
    {
        $this->insert = true;

        foreach ($this->menu->links as $linkKey => $link) {
            if ($link->isDropdown()) {
                foreach ($link->links as $subLinkKey => $subLink) {
                    if ($subLink->slug == $slug) {
                        $link->links->splice($subLinkKey, 0, [$this]);
                    }

                }
            } else {
                if ($link->slug == $slug) {
                    $this->menu->links->splice($linkKey, 0, [$this]);
                }
            }
        }
    }
}