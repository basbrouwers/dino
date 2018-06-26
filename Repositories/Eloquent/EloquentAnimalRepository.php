<?php

namespace Modules\Shelter\Repositories\Eloquent;

use Modules\Shelter\Events\AnimalWasAdded;
use Modules\Shelter\Events\AnimalWasDeleted;
use Modules\Shelter\Events\AnimalWasUpdated;
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


    public function create($data)
    {
        $animal = $this->model->create($data);
        event(new AnimalWasAdded($animal,$data));
        return $animal;
    }

    /**
     * @param $animal
     * @param array $data
     * @return mixed
     */
    public function update($animal, $data)
    {
        $animal->update($data);
        event(new AnimalWasUpdated($animal, $data));
        return $animal;
    }

    public function destroy($animal)
    {
        event(new AnimalWasDeleted($animal));
        return $animal->delete();
    }

}
