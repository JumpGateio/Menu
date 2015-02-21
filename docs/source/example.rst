Examples
========

Full code sample
~~~~~~~~~~~~~~~~
Here is a full menu example.

.. code::

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

Output
~~~~~~
.. TODO:: Put output here.