<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrefixCity;
use App\Http\Requests\UpdatePrefixCity;
use App\Models\CityPrefix;
use Illuminate\Http\Request;

class PrefixCityCountroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citiesPrefix = CityPrefix::select('id','language')->get();
        return view('admin.prefix.indexCity')->with([
            'citiesPrefix'=> $citiesPrefix,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prefix.createCityPrefix');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrefixCity $request)
    {
        $cityPrefix = new CityPrefix();
        $cityPrefix->language = $request->language;
        $cityPrefix->title = $request->title;
        $cityPrefix->description = $request->description;
        $cityPrefix->keywords = $request->keywords;
        $results = $cityPrefix->save();
        return redirect()->back()->with('message','City Prefix added successfully');
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
        $prefix = CityPrefix::find($id);
        return view('admin.prefix.editCityPrefix')->with([
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
    public function update(UpdatePrefixCity $request, $id)
    {
        $prefix = CityPrefix::findOrFail($id);

        $prefix->title = $request->title;
        $prefix->description = $request->description;
        $prefix->keywords = $request->keywords;
        $prefix->save();

        return redirect()->route('city-prefix.index')->with([
            'message'=>'City Prefix updated successfully'
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
        $prefix = CityPrefix::findOrFail($id);
        $prefix->delete();
        return redirect()->route('city-prefix.index')->with([
            'message'=>'City Prefix Deleted Successfully'
        ]);
    }
}
