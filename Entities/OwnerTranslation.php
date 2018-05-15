<?php

namespace Modules\Shelter\Entities;

use Illuminate\Database\Eloquent\Model;

class OwnerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'shelter__owner_translations';
}
