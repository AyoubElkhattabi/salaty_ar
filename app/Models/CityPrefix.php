<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityPrefix extends Model
{
    use HasFactory;
    protected $table = 'cities_prefix';
    protected $fillable = ['language','title','description','keywords'];
    public $timestamps = false;
}
