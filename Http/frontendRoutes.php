<?php

use Illuminate\Routing\Router;

/** @var Router $router */

    $router->get('dieren-in-ons-asiel', [
        'uses' => 'AnimalController@index',
        'as' => 'animals',
    ]);

