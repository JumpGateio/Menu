Quick Start
============
This is a short guide meant to get you up and running quickly.

Creating a new menu
-------------------
When adding a new menu you need to specify the menu name. This is the name that will be used to access the menu object in the furture.

.. code::

    $menu = \Menu::add('left menu');


Adding a link to the menu
-------------------------
To add a link to the menu you just call the method quickLink.

Quick link takes the following parameters:

- Name: The name of the link
- Route: The laravel route of the link. Set to ``null`` for no route.
- Position: The position in the menu where the object should be shown. 0 is the farthest left and increments as you go right.
- Icon: The type of icon to display in the link if any.
- Options: Extra options you would like to pass to the link object.

.. code::

    $menu->quickLink('Members List', 'members.list', 1005, 'fa-users', ['class' => 'btn-warning']);

Finishing up the menu
---------------------
Once all your links have been added then you will need to call the ``end()`` method. This will arrange the links by position and do some finial validation.

.. code::

    $menu->end();

Accessing the menu from your view or controller
-----------------------------------------------
In your view or controller just you will need to call ``getMenu``

.. code::

    $menu = \Menu::getMenu('left menu');

This will return your menu object. From there you can loop through the links and add the appropriate html.

.. code::

    @foreach ($menu->link as $link)
        <a href='{{$link->url}}'>{{$link->name}}</a>
    @endforeach