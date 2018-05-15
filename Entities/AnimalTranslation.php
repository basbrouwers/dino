<?php

namespace Modules\Shelter\Entities;

use Illuminate\Database\Eloquent\Model;

class AnimalTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'shelter__animal_translations';
}
