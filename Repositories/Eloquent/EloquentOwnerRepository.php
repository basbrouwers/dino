<?php

namespace Modules\Shelter\Repositories\Eloquent;

use Modules\Shelter\Repositories\OwnerRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentOwnerRepository extends EloquentBaseRepository implements OwnerRepository
{

    /**
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|EloquentBaseRepository[]
     */
    public function all($type = 'owner')
    {
        return $this->model->where('type',$type);
    }

}
