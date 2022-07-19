<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users', 'UserController');
    $router->resource('orders', 'OrderController');
    $router->resource('tickets', 'TicketController');
    $router->resource('seats', 'SeatController');
    $router->resource('travel_routes', 'TravelRouteController');
    $router->resource('combos', 'ComboController');
    $router->resource('operators', 'OperatorController');
    $router->resource('images', 'ImageController');
});
