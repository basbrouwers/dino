<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' =>'/shelter'], function (Router $router) {
    $router->get('dieren-in-ons-asiel', [
        'uses' => 'AnimalController@index',
        'as' => 'animals.index',
    ]);
    $router->get('dieren-in-ons-asiel/{animal}', [
        'uses' => 'AnimalController@view',
        'as' => 'animals.view',
    ]);


});