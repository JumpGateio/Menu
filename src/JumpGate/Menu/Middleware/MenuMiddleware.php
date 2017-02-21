<?php

namespace JumpGate\Menu\Middleware;

use Closure;

/**
 * Class MenuMiddleware
 *
 * @package JumpGate\Menu\Middleware
 */
class MenuMiddleware
{
    /**
     * Run the request filter.
     *
     * This middleware supports laravel 5.0 and 5.1.
     * In laravel 5.0 you must specify an additional array option
     * with the slug you wish to active. In 5.1 you can just add
     * the slug to the middleware after menu:.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param  string|null              $active
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $active = null)
    {
        if ($active !== null) {
            // Laravel 5.1 [middleware => menu:slug]
            \Menu::setActive($active);
        } else {
            // Laravel 5.0 [middleware => menu, active => slug]
            $route = $request->route();

            if ($route) {
                $actions = $route->getAction();

                if (array_key_exists('active', $actions)) {
                    \Menu::setActive($actions['active']);
                }
            }
        }

        return $next($request);
    }
}
