<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/shelter'], function (Router $router) {
    $router->bind('animal', function ($id) {
        return app('Modules\Shelter\Repositories\AnimalRepository')->find($id);
    });
    $router->get('animals/{type}', [
        'as' => 'admin.shelter.animal.index',
        'uses' => 'AnimalController@index',
        'middleware' => 'can:shelter.animals.index'
    ]);
    $router->get('animals/create/{type?}', [
        'as' => 'admin.shelter.animal.create',
        'uses' => 'AnimalController@create',
        'middleware' => 'can:shelter.animals.create'
    ]);
    $router->post('animals', [
        'as' => 'admin.shelter.animal.store',
        'uses' => 'AnimalController@store',
        'middleware' => 'can:shelter.animals.create'
    ]);
    $router->get('animals/{animal}/edit', [
        'as' => 'admin.shelter.animal.edit',
        'uses' => 'AnimalController@edit',
        'middleware' => 'can:shelter.animals.edit'
    ]);
    $router->get('animals/{animal}/view', [
        'as' => 'admin.shelter.animal.view',
        'uses' => 'AnimalController@view',
        'middleware' => 'can:shelter.animals.view'
    ]);
    $router->put('animals/{animal}', [
        'as' => 'admin.shelter.animal.update',
        'uses' => 'AnimalController@update',
        'middleware' => 'can:shelter.animals.edit'
    ]);
    $router->delete('animals/{animal}', [
        'as' => 'admin.shelter.animal.destroy',
        'uses' => 'AnimalController@destroy',
        'middleware' => 'can:shelter.animals.destroy'
    ]);
    $router->bind('owner', function ($id) {
        return app('Modules\Shelter\Repositories\OwnerRepository')->find($id);
    });


    /**ROUTES FOR OWNERS*/
    $router->get('owners', [
        'as' => 'admin.shelter.owner.index',
        'uses' => 'OwnerController@index',
        'middleware' => 'can:shelter.owners.index'
    ]);
    $router->get('owners/create', [
        'as' => 'admin.shelter.owner.create',
        'uses' => 'OwnerController@create',
        'middleware' => 'can:shelter.owners.create'
    ]);
    $router->post('owners', [
        'as' => 'admin.shelter.owner.store',
        'uses' => 'OwnerController@store',
        'middleware' => 'can:shelter.owners.create'
    ]);
    $router->get('owners/{owner}/edit', [
        'as' => 'admin.shelter.owner.edit',
        'uses' => 'OwnerController@edit',
        'middleware' => 'can:shelter.owners.edit'
    ]);
    $router->put('owners/{owner}', [
        'as' => 'admin.shelter.owner.update',
        'uses' => 'OwnerController@update',
        'middleware' => 'can:shelter.owners.edit'
    ]);
    $router->delete('owners/{owner}', [
        'as' => 'admin.shelter.owner.destroy',
        'uses' => 'OwnerController@destroy',
        'middleware' => 'can:shelter.owners.destroy'
    ]);

    /**ROUTES FOR Adopters*/
    $router->get('adopters', [
        'as' => 'admin.shelter.adopter.index',
        'uses' => 'AdopterController@index',
        'middleware' => 'can:shelter.owners.index'
    ]);


    /**ROUTES FOR BREEDS*/
    $router->bind('breed', function ($id) {
        return app('Modules\Shelter\Repositories\BreedRepository')->find($id);
    });
    $router->get('breeds', [
        'as' => 'admin.shelter.breed.index',
        'uses' => 'BreedController@index',
        'middleware' => 'can:shelter.breeds.index'
    ]);
    $router->get('breeds/create', [
        'as' => 'admin.shelter.breed.create',
        'uses' => 'BreedController@create',
        'middleware' => 'can:shelter.breeds.create'
    ]);
    $router->post('breeds', [
        'as' => 'admin.shelter.breed.store',
        'uses' => 'BreedController@store',
        'middleware' => 'can:shelter.breeds.create'
    ]);
    $router->get('breeds/{breed}/edit', [
        'as' => 'admin.shelter.breed.edit',
        'uses' => 'BreedController@edit',
        'middleware' => 'can:shelter.breeds.edit'
    ]);
    $router->put('breeds/{breed}', [
        'as' => 'admin.shelter.breed.update',
        'uses' => 'BreedController@update',
        'middleware' => 'can:shelter.breeds.edit'
    ]);
    $router->delete('breeds/{breed}', [
        'as' => 'admin.shelter.breed.destroy',
        'uses' => 'BreedController@destroy',
        'middleware' => 'can:shelter.breeds.destroy'
    ]);
// append



});
