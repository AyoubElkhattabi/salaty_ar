<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CityInfo;

class testController extends Controller
{
use CityInfo;
    public function index(){
        $country = 'المغرب';
        $city = 'مراكش';
        return $this->cityInfo($city,$country);
    }
}
