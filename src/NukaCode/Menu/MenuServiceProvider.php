<?php namespace NukaCode\Menu;

use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Share the package with application
     *
     * @return void
     */
    protected function shareWithApp()
    {
        $this->app->singleton( 'menu', function( $app ) {
            return new MenuService( $app );
        } );    }

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
