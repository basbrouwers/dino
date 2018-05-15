<?php

namespace Modules\Shelter\Repositories\Cache;

use Modules\Shelter\Repositories\AnimalRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAnimalDecorator extends BaseCacheDecorator implements AnimalRepository
{
    public function __construct(AnimalRepository $animal)
    {
        parent::__construct();
        $this->entityName = 'shelter.animals';
        $this->repository = $animal;
    }
}
