# Middleware

- [Introduction](#introduction)
- [Usage](#usage)
- [Notes](#notes)

<a name="introduction"></a>
## Introduction
Middleware is provided with the menu package. This middle ware allows you to set which links are marked as active.
This is done via the laravel routes file.

<a name="usage"></a>
## Usage
You can set the middleware and the active item all in one line.

```
Route::get('/', [
    'middleware' => 'active:home', // menu is the middle ware and home is the slug of your menu item.
    'as'         => 'home',
    'uses'       => 'HomeController@index'
]);
```

<a name="notes"></a>
## Notes
This middleware can also be used in the `Route::group()` method as well.

```
Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'active:home'], function () {
    Route::get('/', [
        'as'   => 'home',
        'uses' => 'HomeController@index'
    ]);
});
```
