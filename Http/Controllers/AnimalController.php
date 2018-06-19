<?php
/**
 * Created by PhpStorm.
 * User: bas
 * Date: 10/05/18
 * Time: 20:58
 */

namespace Modules\Shelter\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Shelter\Repositories\AnimalRepository;
use Modules\Shelter\Repositories\BreedRepository;

class AnimalController extends BasePublicController
{

    private $animals;
    private $breeds;

    public function __construct(AnimalRepository $animal, BreedRepository $breeds){
        $this->animals = $animal;
        $this->breeds = $breeds;
    }

    public function index(Request $request)
    {
        return view('shelter::animals.index', ['animals' => $this->animals->all()]);
    }

    public function view(Animal $animal)
    {
        return view('shelter::animals.view', ['animal' => $animal, 'breeds' => $this->breeds->all()->sortBy('name')->pluck('name', 'id')->toArray()]);
    }
}