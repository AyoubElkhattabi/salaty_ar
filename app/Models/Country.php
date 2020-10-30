<?php

namespace App\Models;

use App\Traits\MakeSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Country extends Model
{
    use HasFactory,MakeSlug;
    protected $table = 'countries';
    protected $fillable = ['name_ar','name_en','title','description','keywords','flag','slug','status','timezone','calcmethod'];

    ##################### [ Begin Relationship ] #####################
    public function cities(){
        return $this->hasMany(City::class,'country_id','id');
    }
    ##################### [  End Relationship  ] #####################

    ##################### [  Begin Generate Path  ] ##################
    public function path()
    {
        return url("/country-{$this->id}/".$this->slug);
    }
    ##################### [  End   Generate Path  ] ##################

}
