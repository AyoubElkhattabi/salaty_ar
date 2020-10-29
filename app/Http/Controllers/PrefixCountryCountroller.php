<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrefixCountry;
use App\Http\Requests\UpdatePrefixCountry;
use App\Models\CountryPrefix;
use Illuminate\Http\Request;

class PrefixCountryCountroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryPrefixes = CountryPrefix::select('id','language')->get();
        return view('admin.prefix.indexCountry')->with([
            'countriesPrefix'=>$countryPrefixes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prefix.createCountryPrefix');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrefixCountry $request)
    {
        $countryPrefix = new CountryPrefix();
        $countryPrefix->language = $request->language;
        $countryPrefix->title = $request->title;
        $countryPrefix->description = $request->description;
        $countryPrefix->keywords = $request->keywords;
        $results = $countryPrefix->save();
        return redirect()->back()->with('message','Country Prefix added successfully');
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
        $prefix = CountryPrefix::find($id);
        return view('admin.prefix.editCountryPrefix')->with([
            'prefix'=>$prefix,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrefixCountry $request, $id)
    {
        $prefix = CountryPrefix::findOrFail($id);

        $prefix->title = $request->title;
        $prefix->description = $request->description;
        $prefix->keywords = $request->keywords;
        $prefix->save();

        return redirect()->route('country-prefix.index')->with([
            'message'=>'Country Prefix updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prefix = CountryPrefix::findOrFail($id);
        $prefix->delete();
        return redirect()->route('country-prefix.index')->with([
            'message'=>'Country Prefix Deleted Successfully'
        ]);
    }
}
