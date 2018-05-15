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

class AnimalController extends BasePublicController
{

    private $animals;

    public function __construct(AnimalRepository $animalRepository)
    {
        $this->animals = $animalRepository;
    }
    public function index(Request $request)
    {
        return view('shelter::index', ['animals' => $this->animals->all()]);
    }
}