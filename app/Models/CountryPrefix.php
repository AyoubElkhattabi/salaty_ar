<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryPrefix extends Model
{
    use HasFactory;
    protected $table = 'countries_prefix';
    protected $fillable = ['language','title','description','keywords'];
    public $timestamps = false;
}
