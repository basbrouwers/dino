<?php

namespace Modules\Shelter\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Shelter\Events\Handlers\RegisterShelterSidebar;

class ShelterServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterShelterSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('animals', array_dot(trans('shelter::animals')));
            $event->load('owners', array_dot(trans('shelter::owners')));
            $event->load('breeds', array_dot(trans('shelter::breeds')));
            // append translations



        });
    }

    public function boot()
    {
        $this->publishConfig('shelter', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Shelter\Repositories\AnimalRepository',
            function () {
                $repository = new \Modules\Shelter\Repositories\Eloquent\EloquentAnimalRepository(new \Modules\Shelter\Entities\Animal());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Shelter\Repositories\Cache\CacheAnimalDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Shelter\Repositories\OwnerRepository',
            function () {
                $repository = new \Modules\Shelter\Repositories\Eloquent\EloquentOwnerRepository(new \Modules\Shelter\Entities\Owner());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Shelter\Repositories\Cache\CacheOwnerDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Shelter\Repositories\BreedRepository',
            function () {
                $repository = new \Modules\Shelter\Repositories\Eloquent\EloquentBreedRepository(new \Modules\Shelter\Entities\Breed());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Shelter\Repositories\Cache\CachebreedDecorator($repository);
            }
        );
// add bindings



    }
}
