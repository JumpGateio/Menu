Menus
=====
A menu is a container for your links and drop downs. You can have as many menus as you want, The names just has to be unique.
The name is used as the array key when getting a menu.

Creating a menu
---------------
To create a menu just call the ``add`` method and give the menu a unique name.

.. code::

    \Menu::add('menu name');

Checking the existence of a menu
--------------------------------
You can check the existence of a menu before trying to retrieve it.

.. code::

    \Menu::exists('menu name');

This will return a boolean value with true meaning the menu exists.


Retrieving a menu
------------------
To retrieve a menu you just have to call the ``getMenu`` method and supply the menu name.

.. code::

    \Menu::getMenu('menu name');

This will return the Menu object that you configured.


Adding a link
-------------
Add a link to the menu.

Parameters
~~~~~~~~~~
- Name: The name of the link to add.
- Position: The position for the link in this menu. (Optional - If you do not set this the Default Position will be used)

This will return the link object where you can set the rest of the link options.

Example
~~~~~~~
This is how you would add a link. Make sure to call end once you are down.
.. code::

    $link = $menu->addLink('Google');

    $link->setUrl('http://google.com');

    $menu = $link->end();

Adding a quick link
-------------------
This is a method designed to create a link quickly without needing to go into editing the link object.

Parameters
~~~~~~~~~~
- Name: The name of the link.
- Route: The laravel route for this link.
- Position: The position for the link in this menu. (Optional - If you do not set this the Default Position will be used)
- Icon: The icon for this link.
- Options: The options for this link.

Example
~~~~~~~
.. code::

    $menu->quickLink('Member list', 'member.list', 1001, 'fa-users', []);


Adding a drop down
------------------
Add a drop down to the menu.

Parameters
~~~~~~~~~~
- Name: The name of the link to add.
- Position: The position for the drop down in this menu. (Optional - If you do not set this the Default Position will be used)

This will return the drop down object where you can set the rest of the drop down options.

Example
~~~~~~~
This is how you would add a drop down. Make sure to call end once you are down.
.. code::

    $dropDown = $menu->addDropDown('Google');

    $dropDown->setUrl('http://google.com');

    $menu = $dropDown->end();


Adding a quick drop down
------------------------
This is a method designed to create a drop down quickly without needing to go into editing the drop down object.
This method returns the configured object you will still need to call ``end()`` to get back to the menu object.

Parameters
~~~~~~~~~~
- Name: The name of the link.
- Route: The laravel route for this link.
- Position: The position for the link in this menu. (Optional - If you do not set this the Default Position will be used)
- Icon: The icon for this link.
- Options: The options for this link.

Example
~~~~~~~
.. code::

    $menu->quickDropDown('Member list', 'member.list', 1001, 'fa-users', []);


Default position
----------------
If you do not set the position for the add link or drop down methods then a default position will be added.

The default position in increment by 1000 for each link or drop down. This is so you can insert a link dynamically in the middle of the menu before it is displayed.


Finishing up
------------
Once you are done adding links you need to call ``end()`` one more time. This call will remove restricted links and sort the links by position.
