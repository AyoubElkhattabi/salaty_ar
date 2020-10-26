<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'infos';
    protected $fillable = ['name','logo','logostatus','favicon','title','description','keywords','poweredby'];
}
