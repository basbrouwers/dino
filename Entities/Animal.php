<?php

namespace Modules\Shelter\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Animal extends Model
{

    use MediaRelation;

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

    public function getProfilePictureAttribute()
    {
        return $this->filesByZone('profile_image')->first();
    }
}
