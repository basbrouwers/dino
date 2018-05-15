<?php

namespace Modules\Shelter\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Shelter\Entities\Breed;
use Modules\Shelter\Http\Requests\CreateBreedRequest;
use Modules\Shelter\Http\Requests\UpdateBreedRequest;
use Modules\Shelter\Repositories\BreedRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BreedController extends AdminBaseController
{
    /**
     * @var BreedRepository
     */
    private $breed;

    public function __construct(BreedRepository $breed)
    {
        parent::__construct();

        $this->breed = $breed;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $breeds = $this->breed->all();

        return view('shelter::admin.breeds.index',['breeds'=>$breeds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('shelter::admin.breeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatebreedRequest $request
     * @return Response
     */
    public function store(CreateBreedRequest $request)
    {
        $this->breed->create($request->all());

        return redirect()->route('admin.shelter.breed.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('shelter::breeds.title.breeds')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  breed $breed
     * @return Response
     */
    public function edit(breed $breed)
    {
        return view('shelter::admin.breeds.edit', compact('breed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  breed $breed
     * @param  UpdateBreedRequest $request
     * @return Response
     */
    public function update(breed $breed, UpdateBreedRequest $request)
    {
        $this->breed->update($breed, $request->all());

        return redirect()->route('admin.shelter.breed.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('shelter::breeds.title.breeds')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  breed $breed
     * @return Response
     */
    public function destroy(breed $breed)
    {
        $this->breed->destroy($breed);

        return redirect()->route('admin.shelter.breed.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('shelter::breeds.title.breeds')]));
    }
}
