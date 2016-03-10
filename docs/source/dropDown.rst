Drop Downs
==========
A drop down is just a link that allows you to add sub links.

This Class also implements the linkable trait so it has access to all the link and drop down add methods in the menu class.

.. note:: See link documentation for methods and properties when adding links.


Parameters:
Slug: The slug used to find this drop down again when trying to edit it, when setting the drop down as active or when
inserting before or after another menu item.

Link Name: The name of the drop down.

.. code::

    $menu->dropDown('slug', 'drop down name', function (DropDown $dropDown) {
        $dropDown->link('slug', function (Link $link) {
            $link->name = 'Take me to google';
            $link->url = 'http://google.com';
            $link->options = ['class' => 'btn'];
        });

        $dropDown->link('slug2', function (Link $link) {
            $link->name = 'Take me to git hub';
            $link->url = 'http://github.com';
            $link->options = ['class' => 'btn btn-primary'];
        });
    });

Get drop down
-------------
You can use the get dropdown method to pull back the drop down object and change it.

.. code::

    $menu->getDropDown('slug', function (DropDown $dropDown) {
        $dropDown->name = 'Change the dropdown name';
    });


Check if the drop down has links
--------------------------------
You can call the ``hasLinks()`` method on the drop down class to see if there are any links
This is to allow you to run a foreach if there are links present. Otherwise treat it as a normal link.


Insert After/Before
-------------------
You can tell a link to be inserted before or after another link or dropdown.

Parameters:
slug: The slug of the link or drop down to insert before or after.

.. code::

    $dropDown->insertAfter('slug');
    $dropDown->insertBefore('slug');

Determine Active Parentage
--------------------------
By default, a drop down will become active when a child link becomes active.  Most of the time this is how it should be, but in case that is not desirable there is a helper method to disable this.

.. code::

    $dropdown->disableActiveParentage();
