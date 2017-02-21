Menus
=====
A menu is a container for your links and drop downs. You can have as many menus as you want, The names just has to be unique.
The name is used as the array key when getting a menu.

Creating a menu
---------------
To create a menu just call the ``getMenu`` method and give the menu a unique name.

.. code::

    \Menu::getMenu('menu name');

Checking the existence of a menu
--------------------------------
You can check the existence of a menu before trying to retrieve it.

.. code::

    \Menu::exists('menu name');

This will return a boolean value with true meaning the menu exists.


Retrieving a menu
------------------
To retrieve a menu you just have to call the ``render`` method and supply the menu name.

.. code::

    \Menu::render('menu name');

This will return the Menu object that you configured.


Adding a link
-------------
Add a link to the menu.

Parameters
~~~~~~~~~~
- slug: The slug used to find the link.
- link callback: In this callback you specify your link options.

Example
~~~~~~~
This is how you would add a link.
.. code::

    $testMenu->link('home', function (Link $link) {
        $link->name = 'Home';
        $link->url = route('home');
    });


Adding a drop down
------------------
Add a drop down to the menu.

Parameters
~~~~~~~~~~
- slug: The slug used to find the link.
- text: The text to be displayed for the dropdown
- dropdown callback: In this callback you specify your drop down options.

Example
~~~~~~~
This is how you would add a drop down.
.. code::

    $testMenu->dropDown('user', 'Admin', function (DropDown $dropDown) {
        $dropDown->link('profile.edit', function (Link $link) {
            $link->name = 'Edit your profile';
            $link->url  = 'user/profile/';  // static url
        });
        $dropDown->link('logout', function (Link $link) {
            $link->name = 'Logout';
            $link->url  = route('logout'); // Laravel routed url
        });
    });