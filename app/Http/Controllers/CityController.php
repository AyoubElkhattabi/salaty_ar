<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCity;
use App\Http\Requests\UpdateCity;
use App\Models\City;
use App\Models\Country;
use App\Traits\MakeSlug;
use DateTime;
use DateTimezone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Traits\PrayerInfo;

class CityController extends Controller
{
    use PrayerInfo,MakeSlug;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::select('id','name_en','name_ar','created_at','updated_at','country_id')->with(['country'=>function($req){
            $req->select('id','name_en','flag');
        }])->paginate(Config::get('constants.pagination.adminCities'),['*'],'countries');
        $cities->makeHidden(['country_id']);

       return view('admin.cities.index',[
           'cities'=>$cities,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::select('id','name_en')->get();
        return view('admin.cities.create',[
            'countries'=>$countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCity $request)
    {

        $city = new City;

        $city->country_id   = $request->country_id;
        $city->name_ar     = $request->name_ar;
        $city->name_en     = $request->name_en;
        $city->timezone    = $request->timezone;
        $city->latitude    = $request->latitude;
        $city->longitude   = $request->longitude;
        $city->title       = $request->title;
        $city->description = $request->description;
        $city->keywords    = $request->keywords;
        $city->state       = $request->state;
        $city->space       = $request->space;
        $city->population  = $request->population;
        $city->slug        = $this->make_slug($request->title);

        $city->save();

        return redirect()->back()->with('message','City added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $countries = Country::select('id','name_en')->get();

        return view('admin.cities.edit',[
            'city'=>$city,
            'countries'=>$countries,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCity $request, $id)
    {
        $city = City::findOrFail($id);
        $city->name_ar = $request->name_ar;
        $city->name_en = $request->name_en;
        $city->title = $request->title;
        $city->description = $request->description;
        $city->keywords = $request->keywords;
        $city->state = $request->state;
        $city->timezone = $request->timezone;
        $city->population = $request->population;
        $city->country_id = $request->country_id;
        $city->slug = $this->make_slug($request->title);
        $city->space = $request->space;
        $city->latitude = $request->latitude;
        $city->longitude = $request->longitude;

        $city->save();

        return redirect()->back()->with('message','City updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->back()->with('message','Country deleted successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function city(Request $request , $id)
    {
        //get data from database
        $city = City::findOrFail($id);
        // check if the slug is match with database slug
        if($city->slug !== $request->route('slug')) abort(404);
        // set time zone for city
        $timeZone = (empty($city->timezone)?$city->country->timezone : $city->timezone );

        date_default_timezone_set ($timeZone);
        // get [prayerTimes[,,,,,,,] , nextPrayer = val , remaineTime[h,m,s]]
        $prayersInfo = $this->getPrayerInfo($timeZone,$city->country->calcmethod,$city->latitude,$city->longitude);

        return view('front.city',[
            'city'=>$city,
            'prayersInfo'=>$prayersInfo,
        ]);
    }
}
