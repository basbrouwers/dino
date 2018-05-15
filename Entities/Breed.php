<?php

namespace Modules\Shelter\Entities;


use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{


    protected $table = 'shelter__breeds';
    public $translatedAttributes = [];
    protected $fillable = ['name'];


    public function animal (){
        return $this->hasMany('Modules\Shelter\Entities\Animal');
    }
}
