# Drop Downs

- [Introduction](#introduction)
- [Usage](#usage)
- [Get Drop Down](#get-drop-down)
- [Check if the drop down has links](#has-links)
- [Insert after/before](#insert-before-after)
- [Determine active parentage](#active-parentage)

<a name="introduction"></a>
## Introduction
A drop down is just a link that allows you to add sub links.

This Class also implements the `linkable` trait so it has access to all the link and drop down add methods in the menu class.

> See link documentation for methods and properties when adding links.

<a name="usage"></a>
## Usage
You must provide the following parameters to the `dropDown` method on a menu object.

__Slug__: The slug used to find this drop down again when trying to edit it, when setting the drop down as active or when
inserting before or after another menu item.


__Link Name:__ The name of the drop down.

```
$menu->dropDown('slug', 'drop down name', function (DropDown $dropDown) {
    $dropDown->link('slug', function (Link $link) {
        $link->name = 'Take me to google';
        $link->url = 'http://google.com';
        $link->options = ['class' => 'btn'];
    });

    $dropDown->link('slug2', function (Link $link) {
        $link->name = 'Take me to git hub';
        $link->url = 'http://github.com';
        $link->options = ['class' => 'btn btn-primary'];
    });
});
```

<a name="get-drop-down"></a>
## Get drop down
You can use the `getDropDown` method to pull back the drop down object and change it.

```
$menu->getDropDown('slug', function (DropDown $dropDown) {
    $dropDown->name = 'Change the dropdown name';
});
```

<a name="has-links"></a>
## Check if the drop down has links
You can call the ``hasLinks()`` method on the drop down class to see if there are any links
This is to allow you to run a foreach if there are links present. Otherwise treat it as a normal link.

<a name="insert-before-after"></a>
## Insert after/before
You can tell a link to be inserted before or after another link or drop down.  You only need to pass one parameter to the 
chosen method.

__Slug:__ The slug of the link or drop down to insert before or after.

```
$dropDown->insertAfter('slug');
$dropDown->insertBefore('slug');
```

<a name="active-parentage"></a>
## Determine active parentage
By default, a drop down will become active when a child link becomes active.  Most of the time this is how it should be, 
but in case that is not desirable there is a helper method to disable this.

```
$dropdown->disableActiveParentage();
```
