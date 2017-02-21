# Installation

- [Introduction](#introduction)
- [Composer](#composer)
- [Service Provider](#service-provider)
- [Middleware](#middleware)

<a name="introduction"></a>
## Introduction
Installation guide for the Jumpgate Menu package. This package requires Laravel 5.0 or higher.

<a name="composer"></a>
## Composer
Run the following command to require the menu package in your project.

```
composer require jumpgate/menu:~1.0
```

<a name="service-provider"></a>
## Service Provider
Add the following to the service providers in ``config/app.php``.

```
'providers' => [
    ...
    JumpGate\Menu\MenuServiceProvider::class,
    ...
],
```

<a name="middleware"></a>
## Middleware
Add the following to the kernel in ``app/Http/Kernel.php``

```
protected $middleware = [
   ...
   'active'     => \JumpGate\Menu\Middleware\MenuMiddleware::class,
   ...
];
```
