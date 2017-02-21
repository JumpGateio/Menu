# Menus

- [Introduction](#introduction)
- [Creating a menu](#creating)
- [Checking the existence of a menu](#exists)
- [Retrieving a menu](#retrieve)
- [Adding a link](#add-link)
    - [Parameters](#add-link-parameters)
    - [Example](#add-link-example)
- [Adding a drop down](#add-drop-down)
    - [Parameters](#add-drop-down-parameters)
    - [Example](#add-drop-down-example)

<a name="introduction"></a>
## Introduction
A menu is a container for your links and drop downs. You can have as many menus as you want, The names just has to be unique.
The name is used as the array key when getting a menu.

<a name="creating"></a>
## Creating a menu
To create a menu just call the `getMenu()` method and give the menu a unique name.

```
\Menu::getMenu('menu name'); // Using the facade
menu('menu name');           // Using the helper
```

<a name="exists"></a>
## Checking the existence of a menu
You can check the existence of a menu before trying to retrieve it.

```
\Menu::exists('menu name');  // Using the facade
menu()->exists('menu name'); // Using the helper
```

This will return a boolean value with true meaning the menu exists.

<a name="retrieve"></a>
## Retrieving a menu
To retrieve a menu you just have to call the `render()` method and supply the menu name.

```
\Menu::render('menu name');  // Using the facade
menu()->render('menu name'); // Using the helper
```

This will return the Menu object that you configured.

<a name="add-link"></a>
## Adding a link
Add a link to the menu.

<a name="add-link-parameters"></a>
### Parameters
- __slug:__ The slug used to find the link.
- __link callback:__ In this callback you specify your link options.

<a name="add-link-example"></a>
### Example
This is how you would add a link.

```
$testMenu->link('home', function (Link $link) {
    $link->name = 'Home';
    $link->url  = route('home');
});
```

<a name="add-drop-down"></a>
## Adding a drop down
Add a drop down to the menu.

<a name="add-drop-down-parameters"></a>
### Parameters
- __slug:__ The slug used to find the link.
- __text:__ The text to be displayed for the dropdown
- __dropdown callback:__ In this callback you specify your drop down options.

<a name="add-drop-down-example"></a>
### Example
This is how you would add a drop down.

```
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
```
