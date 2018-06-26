<?php


namespace Modules\Shelter\Events;

use Modules\Media\Contracts\StoringMedia;
use Modules\Shelter\Entities\Animal;

class AnimalWasAdded implements StoringMedia
{
    /**
     * @var Author
     */
    private $animal;
    /**
     * @var array
     */
    private $data;

    public function __construct(Animal $animal, array $data)
    {
        $this->animal = $animal;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->animal;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}