<?php

namespace Modules\Shelter\Events;
use Modules\Media\Contracts\DeletingMedia;
use Modules\Shelter\Entities\Animal;

class AnimalWasDeleted implements DeletingMedia
{
    /**
     * @var Author
     */
    private $animal;
    public function __construct(Animal $animal)
    {
        $this->animal = $animal;
    }
    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->animal->id;
    }
    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->animal);
    }
}