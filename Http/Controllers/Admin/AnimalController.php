<?php

namespace Modules\Shelter\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\Shelter\Entities\Animal;
use Modules\Shelter\Entities\Breed;
use Modules\Shelter\Http\Requests\CreateAnimalRequest;
use Modules\Shelter\Http\Requests\UpdateAnimalRequest;
use Modules\Shelter\Repositories\AnimalRepository;
use Modules\Shelter\Repositories\BreedRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Shelter\Repositories\OwnerRepository;

class AnimalController extends AdminBaseController
{
    /**
     * @var AnimalRepository
     */
    private $animal;
    private $breeds;
    private $owners;
    public function __construct(AnimalRepository $animal, BreedRepository $breeds, OwnerRepository $owners)
    {
        parent::__construct();
        $this->assetPipeline->requireCss('shelteradmin.css');

        $this->animal   = $animal;
        $this->breeds   = $breeds;
        $this->owners   = $owners;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(String $type)
    {

        $animals = $this->animal->all($type);
        $this->assetPipeline->requireCss('shelteradmin.css');
        return view('shelter::admin.animals.index', ['animals' => $animals, 'type' => $type]);
    }

    /**
     * @param  Animal $animal
     * @return Response
     */
    public function view(Animal $animal)
    {
        return view('shelter::admin.animals.view', ['animal' => $animal, 'breeds' => $this->breeds->all()->sortBy('name')->pluck('name', 'id')->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(String $type = 'dog')
    {
        $breeds = $this->breeds->all()->sortBy('name')->pluck('name', 'id')->toArray();
        $owners = $this->owners->all()->sortBy('lastname')->pluck('lastname', 'id')->toArray();

        return view('shelter::admin.animals.create', ['breeds' => $breeds, 'owners' => $owners, 'type' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAnimalRequest $request
     * @return Response
     */
    public function store(CreateAnimalRequest $request)
    {
        $this->animal->create($request->all());

        return redirect()->route('admin.shelter.animal.index', ['type' => 'dog'])
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('shelter::animals.title.animals')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Animal $animal
     * @return Response
     */
    public function edit(Animal $animal)
    {
        $breeds = $this->breeds->all()->sortBy('name')->pluck('name', 'id')->toArray();
        $owners = $this->owners->all()->sortBy('lastname')->pluck('lastname', 'id')->toArray();

        return view('shelter::admin.animals.edit', ['animal' => $animal, 'breeds' => $breeds, 'owners' => $owners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Animal $animal
     * @param  UpdateAnimalRequest $request
     * @return Response
     */
    public function update(Animal $animal, UpdateAnimalRequest $request)
    {

        $this->animal->update($animal, $request->all());
        return redirect()->route('admin.shelter.animal.index',['type'=>$request->get('type')])
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('shelter::animals.title.animals')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Animal $animal
     * @return Response
     */
    public function destroy(Animal $animal)
    {
        $this->animal->destroy($animal);

        return redirect()->route('admin.shelter.animal.index', ['type' => $animal['type']])
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('shelter::animals.title.animals')]));
    }
}
