# Menu

This package adds a simple menu system to the nukacode project.

## Installation

Begin by installing the package with composer.
	composer require nukacode/menu:dev-master

Add menu to your app config service providers.
	'NukaCode\Menu\MenuServiceProvider',

Publish your config files
	php artisan config:publish nukacode/menu

## Usage

The menu system is use by calling the MenuBulider class.
This class starts building your menu and you just keep method chaining until you are done.
Right now you have the option to add links and drop downs to your menus.

Example syntax:
	$menu = new MenuBuilder();
        $menu->createMenu('leftMenu')
            ->addLink('Home')
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
