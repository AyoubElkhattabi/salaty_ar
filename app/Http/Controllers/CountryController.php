<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountry;
use App\Http\Requests\UpdateCountry;
use App\Models\City;
use App\Models\Country;
use App\Models\Info;
use App\Traits\MakeSlug;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Traits\PrefixReplace;

class CountryController extends Controller
{

    use UploadImage,MakeSlug,PrefixReplace;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(Config::get('constants.pagination.adminCountries'),['*'],'countries');
        return view('admin.countries.index',[
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountry $request)
    {
        //$validator = $request->validate();

        // get the
        $automatcInfo = $this->prefixReplace('country',null,$request->name_ar);

        $country = new Country;

        // check if request has a file
        if($request->hasFile('flag') && $request->file('flag')->isValid()){
            $flag = $this->uploadImage($request->flag,'public/images/flags');
        }else{
            return redirect()->back()->with('message','Flag Image is not Valid');
        }

        $country->name_ar     = $request->name_ar;
        $country->name_en     = $request->name_en;
        $country->title       = $automatcInfo['title'];
        $country->description = $automatcInfo['description'];
        $country->keywords    = $automatcInfo['keywords'];
        $country->flag        = $flag['name'];
        $country->slug        = $this->make_slug($automatcInfo['title']);
        $country->timezone    = $request->timezone ;
        $country->calcmethod  = $request->calcmethod;


        $country->save();

        return redirect()->back()->with('message','Country added successfully');

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
        $country = Country::where('id','=',$id)->firstOrFail();
        return view('admin.countries.edit',[
            'country'=>$country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountry $request, $id)
    {
        $country = Country::where('id','=',$id)->first();

        if($request->hasFile('flag') ){
                if($request->file('flag')->isValid()){
                    $flag = $this->uploadImage($request->file('flag'),'public/images/flags');
                    $country->flag = $flag['name'];
                }else{
                    return redirect()->back()->with('messageError','Flag Image is not Valid');
                }
        }

        $country->name_ar     = $request->name_ar;
        $country->name_en     = $request->name_en;
        $country->title       = $request->title;
        $country->description = $request->description;
        $country->keywords    = $request->keywords;
        $country->slug        = $this->make_slug($request->title);
        $country->timezone    = $request->timezone ;
        $country->calcmethod  = $request->calcmethod;

        $country->save();


        return redirect()->back()->with('message','Country updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $country = Country::where('id','=',$id)->firstOrFail();
       $country->delete();
       return redirect()->back()->with('message','Country deleted successfully ');
    }

    /**
     * Show all Country in front index page
     *
     */
    public function homepage()
    {
        $homeInfo = Info::first(); // get index info from table info
        $countries = Country::select('id','name_ar','name_en','flag','title','slug')->paginate(Config::get('constants.pagination.countries'),['*'],'countries');
        return view('front.index',[
            'homeInfo' => $homeInfo,
            'countries'=> $countries,
        ]);
    }

    /**
     * Show Country's cities  in front
     *
     */
    public function country(Request $request ,$id){

        $country = Country::select('name_ar','name_en','title','description','keywords','flag','slug')->findOrFail($id);
        // Begin check if the slug is match with database slug
        if($request->route('slug')!==$country->slug) abort(404);

        $cities = Country::find($id)->cities()->paginate(Config::get('constants.pagination.cities'));
        return view('front.country',[
            'country'=>$country,
            'cities' =>$cities
        ]);


    }




}
