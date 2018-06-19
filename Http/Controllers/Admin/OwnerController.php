<?php

namespace Modules\Shelter\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Shelter\Entities\Owner;
use Modules\Shelter\Http\Requests\CreateOwnerRequest;
use Modules\Shelter\Http\Requests\UpdateOwnerRequest;
use Modules\Shelter\Repositories\OwnerRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class OwnerController extends AdminBaseController
{
    /**
     * @var OwnerRepository
     */
    private $owner;

    public function __construct(OwnerRepository $owner)
    {
        parent::__construct();

        $this->owner = $owner;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $type
     * @return Response
     */
    public function index($type='owner')
    {
        $owners = $this->owner->all($type);

        return view('shelter::admin.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($type='owner')
    {
        return view('shelter::admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOwnerRequest $request
     * @return Response
     */
    public function store(CreateOwnerRequest $request)
    {
        $this->owner->create($request->all());

        return redirect()->route('admin.shelter.owner.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('shelter::owners.title.owners')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  owner $owner
     * @return Response
     */
    public function edit(Owner $owner)
    {
        return view('shelter::admin.owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  owner $owner
     * @param  UpdateOwnerRequest $request
     * @return Response
     */
    public function update(owner $owner, UpdateOwnerRequest $request)
    {
        $this->owner->update($owner, $request->all());

        return redirect()->route('admin.shelter.owner.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('shelter::owners.title.owners')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  owner $owner
     * @return Response
     */
    public function destroy(owner $owner)
    {
        $this->owner->destroy($owner);

        return redirect()->route('admin.shelter.owner.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('shelter::owners.title.owners')]));
    }
}
