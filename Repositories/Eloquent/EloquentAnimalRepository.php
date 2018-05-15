<?php

namespace Modules\Shelter\Repositories\Eloquent;

use Modules\Shelter\Repositories\AnimalRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentAnimalRepository extends EloquentBaseRepository implements AnimalRepository
{
    /**
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|EloquentBaseRepository[]
     */
    public function all($type = 'dog')
    {
        return $this->model->where('type',$type)->with('breed')->get();
    }

}
