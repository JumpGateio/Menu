<?php namespace NukaCode\Menu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;


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
        $this->package('nukacode/menu');
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
        $this->app->singleton( 'menu', function( $app ) {
            return new MenuContainer( $app );
        } );
    }

    /**
     * Register aliases
     *
     * @return void
     */
    protected function registerAliases()
    {
        $aliases = [
            // Facades
            'Menu'                        => 'NukaCode\Menu\MenuFacade',
        ];

        $loader     = AliasLoader::getInstance();

        foreach ($aliases as $alias => $class) {
            $loader->alias($alias, $class);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
