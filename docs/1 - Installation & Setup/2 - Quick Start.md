Quick Start
============
This is a short guide meant to get you up and running quickly.

Creating a new menu
-------------------
When adding a new menu you need to specify the menu name. This is the name that will be used to access the menu object in the future.

.. code::

    $menu = \Menu::getMenu('leftMenu');


Adding a link to the menu
-------------------------
To add a link to the menu you just call the method link. This method takes a slug as the first parameter.
This slug is used in insertAfter and insertBefore. The second parameter is a callback with your link data.

.. code::

        $leftMenu->link('home', function (Link $link) {
            $link->name = 'The name of the link';
            $link->url = 'A url or you can use the route method with a laravel named route';
            $link->options[] = 'Add another option here';
        });

Adding a drop down to the menu
------------------------------
To add a dop down just add a drop down method. The first parameter is the slug. The second is the text for the drop down.
The third is a call back where you wil add your link methods.

.. code::

            $rightMenu->dropDown('user', \Auth::user()->username, function (DropDown $dropDown) {
                $dropDown->link('profile.edit', function (Link $link) {
                    $link->name = 'Edit your profile';
                    $link->url  = 'user/profile/';
                });
                $dropDown->link('logout', function (Link $link) {
                    $link->name = 'Logout';
                    $link->url  = route('logout');
                });
            });

Accessing the menu from your view or controller
-----------------------------------------------
In your view or controller just you will need to call ``render``

.. code::

    $menu = \Menu::render('leftMenu');

This will return your menu object. From there you can loop through the links and add the appropriate html.

.. code::

    @foreach ($menu->link as $link)
        <a href='{{$link->url}}'>{{$link->name}}</a>
    @endforeach