Links
=====
Links are single objects under a menu that are meant to be used to create an html link.
You have the option to create a link manually or via the quick link method.

Name
----
The name property is used to create the human readable link text.

Set Name
~~~~~~~~
Set the name of the link

.. code::

    $link->setName('New Name');

Get Name
~~~~~~~~
The name can be accessed via the name property

.. code::

    $link->name

URL
----
The url is the address the link will point to.

Set Url
~~~~~~~
Set the url of a link

.. code::

    $link->setUrl('http://nukacode.com');

Get Url
~~~~~~~
The url can be accessed via the url property

.. code::

    $link->url

Position
--------
The position is where the link will appear in the menu. The lower the number the higher it will be in the list.

.. note:: The position is used as the array key. When the ``end()`` method on the menu is called all links will have there key changed to the position and the array is then sorted.

Set Position
~~~~~~~~~~~~
Set the position of a link

.. code::

    $link->setPosition(1001);

Get Position
~~~~~~~~~~~~
The position can be accessed via the position property

.. code::

    $link->position

Icon
----
The icon can be used to add an icon to the link

Set Icon
~~~~~~~~
Set the icon for a link

.. code::

    $link->setIcon('fa-user');

Get Icon
~~~~~~~~
The icon can be accessed bia the icon property

.. code::

    $link->icon

Example Code
~~~~~~~~~~~~
.. code::

    if ($link->icon) {
        $icon = "<i class='fa {$link->icon}'></i>";
    }

Restricted Flag
---------------
The restricted flag is used to remove an item from the menu. See Filter

Set Restricted Flag
~~~~~~~~~~~~~~~~~~~
Set the restricted flag (Default: false)

.. TODO:: This needs to have a setter created.

.. code::

    $this->restricted = true;

Get Restricted Flag
~~~~~~~~~~~~~~~~~~~
The restricted flag can be accessed via the ``isRestricted()`` method.

.. note:: After the ``end()`` method on the menu is called this link object will no longer exist in the menu.

.. code::

    $link->isRestricted()

Options
-------
Options can be used for extra properties for the link like: class, alt-text, style, exc.

Set Options
~~~~~~~~~~~
Set the options array

.. note:: Options are saved as an array. Adding options just merges the new options into the array.

.. code::

    $link->setOptions([
        'class' => 'btn-warning'
    ]);

Get Options
~~~~~~~~~~~
The options can be accessed via the options property

.. code::

    $this->options

Active Flag
-----------
The active property is used to show which link is currently active. (Default: false)

Set Active Flag
~~~~~~~~~~~~~~~
Set the active flag. The default parameter for ``setActive`` is true

.. code::

    // Set link to active
    $link->setActive();
    $link->setActive(true);

    // Set link to inactive
    $link->setActive(false);

Get Active Flag
~~~~~~~~~~~~~~~
The active flag can be accessed via the ``isActive()`` method.

.. code::

    $link->isActive()

Filters
-------
Filters are used to remove a link if it should not be shown.

For example if a user is logged in then you could have a filter in the sign up and login links that will remove them is there is an active user.

.. note:: Right now you can not use active user information in link names if you are using filters because the data might not exist yet. This is being addressed in issue MENU-1

Set Filter
~~~~~~~~~~
The filter is set via callback. Returning false will restrict access to the link and returning true will allow the link to be seen.

.. code::

    // This link will not be shown
    $link->setFilter(function (){
        return false;
    });

    // This link will be shown
    $link->setFilter(function (){
        return true;
    });

    // Live example
    $link->setFilter(function () {
        return Auth::isGuest();
    });

Get Filter
~~~~~~~~~~
The filter sets the restricted flag. This can be access via the ``isRestricted()`` method.

.. code::

    $link->isRestricted();

Finishing the link
------------------
To finish adding the link and go back to the menu you will need to run the ``end()`` method.

This method does two thing.

1: If the route property has been test it will get the URI for the route and set the url for the link.
2: If active is not set it will check the current URI and if the URI matches the this links URI it sets the link to active. Otherwise it sets active to false.