Middleware
==========
Middleware is provided with the menu package. This middle ware allows you to set which links are marked as active.
This is done via the laravel routes file.

This middleware is compatible with Laravel 5.0 and 5.1.

Laravel 5.0
-----------
In laravel 5.0 you need to specify what middle ware you will use and the active link.

.. code::

    Route::get('/', [
        'middleware' => 'menu',
        'active' => 'home', // The slug of your menu item.
        'as'   => 'home',
        'uses' => 'HomeController@index'
    ]);



Laravel 5.1
-----------
In laravel 5.1 you can set the middle ware and the active item all in one line.

.. code::

    Route::get('/', [
        'middleware' => 'menu:home', // menu is the middle ware and home is the slug of your menu item.
        'as'   => 'home',
        'uses' => 'HomeController@index'
    ]);

Notes
-----
This middle ware can also be used in the Route::group method as well.

.. code::

    Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'menu:home'], function () {
        Route::get('/', [
            'as'   => 'home',
            'uses' => 'HomeController@index'
        ]);
    });