Installation
============
Installation guide for the NukeCode Menu package. This package requires Laravel 5.0 or higher.

Composer
--------
Run the following command to require the menu package in your project.

.. code::

    composer require nukacode/menu:1.0.*

Service Provider
----------------
Add the following to the service providers in ``config/app.php``.

.. code::

    'NukaCode\Menu\MenuServiceProvider',

Middleware
----------
Add the following to the kernel in ``app\kernel.php``

.. code::

    'menu' => '\NukaCode\Menu\Middleware\MenuMiddleware',