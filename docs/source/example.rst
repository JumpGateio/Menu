Examples
========

Full code sample
~~~~~~~~~~~~~~~~
Here is a full menu example.

.. code::

        $leftMenu = \Menu::getMenu('leftMenu');
        $rightMenu = \Menu::getMenu('rightMenu');

        // Home
        $leftMenu->link('home', function (Link $link) {
            $link->name = 'Home';
            $link->url = route('home');
        });

        if (\Auth::guest()) {
            $rightMenu->link('login', function (Link $link) {
                $link->name = 'Login';
                $link->url = route('login');
            });

            $rightMenu->link('register', function (Link $link) {
                $link->name = 'Register';
                $link->url = route('register');
            });
        } else {
            \Auth::user()->updateLastActive();

            if (\Auth::user()->is('ADMIN')) {
                $rightMenu->dropDown('admin', 'Admin', function (DropDown $dropDown) {
                    $dropDown->link('dashboard', function (Link $link) {
                        $link->name = 'Dashboard';
                        $link->url  = route('admin.index');
                    });
                });
            }

            $rightMenu->dropDown('user', \Auth::user()->username, function (DropDown $dropDown) {
                $dropDown->link('profile.edit', function (Link $link) {
                    $link->name = 'Edit your profile';
                    $link->url  = 'user/profile/';
                });
                $dropDown->link('logout', function (Link $link) {
                    $link->name = 'Logout';
                    $link->url  = route('logout');
                });
            });

            $rightMenu->link('profile.view', function (Link $link) {
                $link->name = 'Public profile';
                $link->url  = 'user/view/' . \Auth::user()->id;
                $link->insertAfter('profile.edit');
            });
        }

Output
~~~~~~
.. code::

        NukaCode\Menu\Menu Object
        (
            [name] => right_menu
            [links] => Illuminate\Support\Collection Object
                (
                    [items:protected] => Array
                        (
                            [0] => NukaCode\Menu\Link Object
                                (
                                    [menu] => NukaCode\Menu\Menu Object
         *RECURSION*
                                    [slug] => login
                                    [name] => Login
                                    [url] => http://localhost:5565/login
                                    [options] => Array
                                        (
                                        )

                                    [insert] =>
                                    [active] =>
                                )

                            [1] => NukaCode\Menu\Link Object
                                (
                                    [menu] => NukaCode\Menu\Menu Object
         *RECURSION*
                                    [slug] => register
                                    [name] => Register
                                    [url] => http://localhost:5565/register
                                    [options] => Array
                                        (
                                        )

                                    [insert] =>
                                    [active] =>
                                )

                        )

                )

            [insert] =>
        )
        NukaCode\Menu\Menu Object
        (
            [name] => left_menu
            [links] => Illuminate\Support\Collection Object
                (
                    [items:protected] => Array
                        (
                            [0] => NukaCode\Menu\Link Object
                                (
                                    [menu] => NukaCode\Menu\Menu Object
         *RECURSION*
                                    [slug] => home
                                    [name] => Home
                                    [url] => http://localhost:5565
                                    [options] => Array
                                        (
                                        )

                                    [insert] =>
                                    [active] =>
                                )

                        )

                )

            [insert] =>
        )