<?php

namespace Modules\Shelter\Entities;


use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{


    protected $table = 'shelter__owners';
    public $translatedAttributes = [];
    protected $fillable = ['firstname','lastname','street','housenumber','zipcode','place','email','phonenumber'];


    public function animal (){
        return $this->hasMany('Modules\Shelter\Entities\Animal');
    }
}
