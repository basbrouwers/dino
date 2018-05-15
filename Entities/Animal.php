<?php

namespace Modules\Shelter\Entities;


use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{


    protected $table = 'shelter__animals';
    public $translatedAttributes = [];
    protected $fillable = ['name', 'gender', 'breed_id', 'with_other_dog', 'with_other_cat', 'children_below_age_7',
                            'children_above_age_7','fixed','aggression','aggression_info','chipped','owner_has_passport','
                            additional_info','photo','owner_id'];


    public function breed()
    {
        return $this->belongsTo('Modules\Shelter\Entities\Breed');
    }


    public function owner()
    {
        return $this->belongsTo('Modules\Shelter\Entities\Owner');
    }
}
