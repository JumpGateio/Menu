# Links

- [Introduction](#introduction)
- [Name](#name)
    - [Set Name](#set-name)
    - [Get Name](#get-name)
- [URL](#url)
    - [Set URL](#set-url)
    - [Get URL](#get-url)
- [Options](#options)
    - [Set Options](#set-options)
    - [Get Options](#get-options)
- [Active Flag](#active-flag)
    - [Set Active Flag](#set-active-flag)
    - [Get Active Flag](#get-active-flag)
- [Insert After/Before](#insert)
    - [Parameters](#parameters)

<a name="introduction"></a>
## Introduction
Links are single objects under a menu that are meant to be used to create an html link.
You have the option to create a link manually or via the quick link method.

```
$menu->link('slug', function (Link $link) {
    $link->name = 'Take me to google';
    $link->url = 'http://google.com';
    $link->options = ['class' => 'btn'];
});
```

<a name="name"></a>
## Name
The name property is used to create the human readable link text.

<a name="set-name"></a>
### Set Name
Set the name of the link.

```
$link->name = 'Name';
```

<a name="get-name"></a>
### Get Name
The name can be accessed via the name property.

```
$link->name
```

<a name="url"></a>
## URL
The url is the address the link will point to.  This needs to be a valid URL.  You could use `route()` to create one from 
your existing routes files.

<a name="set-url"></a>
### Set Url
Set the url of a link.

```
$link->url = 'http://nukacode.com';
```

<a name="get-url"></a>
### Get Url
The url can be accessed via the url property.

```
$link->url
```

<a name="options"></a>
## Options
Options can be used for extra properties for the link like: class, alt-text, style, exc.

<a name="set-options"></a>
### Set Options
Set the options array

> Options are saved as an array. Adding options just merges the new options into the array.

```
$link->options = [
    'class' => 'btn-warning'
];
```

<a name="get-options"></a>
### Get Options
The options can be accessed via the options property.

```
$this->options
```

<a name="active-flag"></a>
## Active Flag
The active property is used to show which link is currently active. (Default: false)

<a name="set-active-flag"></a>
### Set Active Flag
Set the active flag. The default parameter for `setActive` is true.

```
// Set link to active
$link->setActive();
$link->setActive(true);

// Set link to inactive
$link->setActive(false);
```

<a name="get-active-flag"></a>
### Get Active Flag
The active flag can be accessed via the `isActive()` method.

```
$link->isActive();
```

<a name="insert"></a>
## Insert After/Before
You can tell a link to be inserted before or after another link or drop down.

### Parameters
__slug:__ The slug of the link or drop down to insert before or after.

```
$link->insertAfter('slug');
$link->insertBefore('slug');
```
