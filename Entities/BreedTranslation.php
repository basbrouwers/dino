<?php

namespace Modules\Shelter\Entities;

use Illuminate\Database\Eloquent\Model;

class breedTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'shelter__breed_translations';
}
