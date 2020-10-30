<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = ['name_ar','name_ar','title','description','keywords','state','timezone','space','population','country_id','slug','latitude','longitude','status'];

    ##################### [ Begin Relationship ] #####################
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
    ##################### [  End Relationship  ] #####################

    ##################### [  Begin Generate Path  ] ##################
    public function path()
    {
        return url("/city-{$this->id}/".$this->slug);
    }
    ##################### [  End   Generate Path  ] ##################
}
