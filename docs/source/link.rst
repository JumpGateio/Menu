Links
=====
Links are single objects under a menu that are meant to be used to create an html link.
You have the option to create a link manually or via the quick link method.

.. code::

    $menu->link('slug', function (Link $link) {
        $link->name = 'Take me to google';
        $link->url = 'http://google.com';
        $link->options = ['class' => 'btn'];
    });

Name
----
The name property is used to create the human readable link text.

Set Name
~~~~~~~~
Set the name of the link

.. code::

    $link->name = 'Name';

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

    $link->url = 'http://nukacode.com';

Get Url
~~~~~~~
The url can be accessed via the url property

.. code::

    $link->url

Options
-------
Options can be used for extra properties for the link like: class, alt-text, style, exc.

Set Options
~~~~~~~~~~~
Set the options array

.. note:: Options are saved as an array. Adding options just merges the new options into the array.

.. code::

    $link->options = [
        'class' => 'btn-warning'
    ];

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

Insert After/Before
-------------------
You can tell a link to be inserted before or after another link or dropdown.

Parameters:
slug: The slug of the link or drop down to insert before or after.

.. code::

    $link->insertAfter('slug');
    $link->insertBefore('slug');