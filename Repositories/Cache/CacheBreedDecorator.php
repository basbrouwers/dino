<?php

namespace Modules\Shelter\Repositories\Cache;

use Modules\Shelter\Repositories\BreedRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBreedDecorator extends BaseCacheDecorator implements breedRepository
{
    public function __construct(BreedRepository $breed)
    {
        parent::__construct();
        $this->entityName = 'shelter.breeds';
        $this->repository = $breed;
    }
}
