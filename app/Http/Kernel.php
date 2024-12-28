<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

  /**
   * The application's global HTTP middleware stack.
   *
   * @var array
   */
  protected $middleware = [
    \Fruitcake\Cors\HandleCors::class,
    \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
  ];

  /**
   * The application's route middleware.
   *
   * @var array
   */
 
   protected $routeMiddleware = [
     'role' => \App\Http\Middleware\RoleMiddleware::class,
   ];

   protected $clientMiddleware = [
      'client' => \App\Http\Middleware\ClientMiddleware::class,
   ];


}