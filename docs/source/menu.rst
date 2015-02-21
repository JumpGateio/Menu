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

