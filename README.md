# Menu

This package adds a simple menu system to the nukacode project.

## Installation

Begin by installing the package with composer.

    composer require nukacode/menu:dev-master

Add menu to your app config service providers.

    'NukaCode\Menu\MenuServiceProvider',

## Usage

The menu system is used by calling the Menu facade.
This class starts building your menu and you just keep method chaining until you are done.
Right now you have the option to add links and dropdowns to your menus.

Example syntax:

    $menu = \Menu::add('leftMenu');
         $menu->addLink('Home')
             ->setRoute('home')
             ->setPosition(1)
             ->setIcon('fa-clue')
             ->setFilter(function (){
                 return false;
             })
             ->end()
         ->addLink('Member List')
             ->setRoute('user.memberlist')
             ->setPosition(2)
             ->setIcon('fa-user')
             ->setFilter(function (){
                 return true;
             })
             ->end()
         ->addDropDown('Admin')
             ->setRoute('admin.index')
             ->setPosition(4)
             ->setIcon('fa-hammer')
             ->addLink('User Admin')
                 ->setRoute('admin.user')
                 ->setPosition(0)
                 ->setIcon('fa-beer')
                 ->end()
             ->addLink('User Admin')
                 ->setRoute('admin.user')
                 ->setPosition(0)
                 ->setIcon('fa-beer')
                 ->end()
             ->end()
         ->end();

To get a menu you would call the get menu method on the facade with the name of the menu you used.

    \Menu::getMenu('leftMenu');
    
This will return the menu object. You then loop through all the link objects in your view.

# Filtering a menu link

You can apply a filter to any link by using a closure that returns a boolean value. If the filter return true then the menu item will be striped from the menu when it is redered.

    ->setFilter(function () {
    	// block access to this menu item for guests
    	return \Auth::isGuest();
    })
