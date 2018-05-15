<?php

namespace Modules\Shelter\Repositories\Cache;

use Modules\Shelter\Repositories\OwnerRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheOwnerDecorator extends BaseCacheDecorator implements OwnerRepository
{
    public function __construct(OwnerRepository $owner)
    {
        parent::__construct();
        $this->entityName = 'shelter.owners';
        $this->repository = $owner;
    }
}
