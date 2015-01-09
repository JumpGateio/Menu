<?php namespace NukaCode\Menu;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class MenuServiceProvider
 *
 * @package NukaCode\Menu
 */
class MenuServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
//        $this->package('nukacode/menu');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->shareWithApp();
        $this->registerAliases();
    }

    /**
     * Share the package with application
     *
     * @return void
     */
    protected function shareWithApp()
    {
        $this->app->singleton('menu', function () {
            return new MenuContainer();
        });
    }

    /**
     * Register aliases
     *
     * @return void
     */
    protected function registerAliases()
    {
        $aliases = [
            'Menu' => 'NukaCode\Menu\MenuFacade',
        ];

        $loader = AliasLoader::getInstance();

        foreach ($aliases as $alias => $class) {
            $loader->alias($alias, $class);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return ['menu'];
    }

}
