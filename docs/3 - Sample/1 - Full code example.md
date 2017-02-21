# Full Example

- [Code syntax](#syntax)
    - [App\Providers\ComposerServiceProvider.php](#composer-sp)
    - [configs/app.php](#config)
    - [App\Http\Composers\MenuComposer.php](#menu-composer)
- [Output](#output)
    - [Left Menu](#left-menu)
    - [Right Menu](#right-menu)

<a name="syntax"></a>
## Code syntax
Here is a full menu example.

<a name="composer-sp"></a>
### App\Providers\ComposerServiceProvider.php
```
<?php
   
   namespace App\Providers;
   
   use Illuminate\Support\ServiceProvider;
   
   class ComposerServiceProvider extends ServiceProvider
   {
       /**
        * Register bindings in the container.
        *
        * @return void
        */
       public function boot()
       {
           view()->composer(
               [
                   'layouts.default',
               ],
               'App\Http\Composers\MenuComposer'
           );
       }
   
       /**
        * Register the service provider.
        *
        * @return void
        */
       public function register()
       {
           //
       }
   }
```

<a name="config"></a>
### configs/app.php
```
'providers' => [
    ...
    App\Providers\ComposerServiceProvider::class,
    ...
],
```

<a name="menu-composer"></a>
### App\Http\Composers\MenuComposer.php
```
<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use JumpGate\Menu\DropDown;
use JumpGate\Menu\Link;

class MenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $this->generateLeftMenu();
        $this->generateRightMenu();
    }

    /**
     * Adds items to the menu that appears on the left side of the main menu.
     */
    private function generateLeftMenu()
    {
        $leftMenu = \Menu::getMenu('leftMenu');

        $leftMenu->link('home', function (Link $link) {
            $link->name = 'Home';
            $link->url  = route('home');
        });
    }

    /**
     * Adds items to the menu that appears on the right side of the main menu.
     */
    private function generateRightMenu()
    {
        $rightMenu = \Menu::getMenu('rightMenu');
        
        if (auth()->guest()) {
            $rightMenu->link('login', function (Link $link) {
                $link->name = 'Login';
                $link->url = route('login');
            });
        
            $rightMenu->link('register', function (Link $link) {
                $link->name = 'Register';
                $link->url = route('register');
            });
        }
        
        if (auth()->check()) {
            if (auth()->user()->is('ADMIN')) {
                $rightMenu->dropDown('admin', 'Admin', function (DropDown $dropDown) {
                    $dropDown->link('dashboard', function (Link $link) {
                        $link->name = 'Dashboard';
                        $link->url  = route('admin.index');
                    });
                });
            }
        
            $rightMenu->dropDown('user', auth()->user()->email, function (DropDown $dropDown) {
                $dropDown->link('profile.edit', function (Link $link) {
                    $link->name = 'Edit your profile';
                    $link->url  = route('user.profile');
                });
                $dropDown->link('logout', function (Link $link) {
                    $link->name = 'Logout';
                    $link->url  = route('auth.logout');
                });
            });
        
            $rightMenu->link('profile.view', function (Link $link) {
                $link->name = 'Public profile';
                $link->url  = 'user/view/' . auth()->user()->id;
                $link->insertAfter('profile.edit');
            });
        }
    }
}
```

<a name="output"></a>
## Output

<a name="right-menu"></a>

<a name="left-menu"></a>
### Left Menu
```
JumpGate\Menu\Menu Object
(
    [name] => left_menu
    [links] => Illuminate\Support\Collection Object
        (
            [items:protected] => Array
                (
                    [0] => JumpGate\Menu\Link Object
                        (
                            [menu] => JumpGate\Menu\Menu Object
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
```

### Right Menu
```
JumpGate\Menu\Menu Object
(
    [name] => right_menu
    [links] => Illuminate\Support\Collection Object
        (
            [items:protected] => Array
                (
                    [0] => JumpGate\Menu\Link Object
                        (
                            [menu] => JumpGate\Menu\Menu Object
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

                    [1] => JumpGate\Menu\Link Object
                        (
                            [menu] => JumpGate\Menu\Menu Object
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
```
