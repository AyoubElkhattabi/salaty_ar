<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInfo;
use App\Models\Info;
use App\Traits\UploadImage;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id=null)
    {
        $config = Info::first();
        return view('admin.config.edit')->with('infos', $config);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInfo $request, $id)
    {
        //validate data
        //$validated = $request->validated();


        // GET THE FIRST ROW OF INFORMATIONS
        $info = Info::first();

        // check if request has a file name logo or favicon or both if exists store it
        if($request->hasFile('logo')){
            if($request->file('logo')->isValid()){
                $logo = $this->UploadImage($request->file('logo'),'public/images/site');
                $info->logo = $logo['name'];
            }
        }

        if($request->hasFile('favicon')){
            if($request->file('favicon')->isValid()){
                $favicon = $this->UploadImage($request->file('favicon'),'public/images/site');
                $info->favicon = $favicon['name'];
            }
        }

        // fill data to object
        $info->name        = $request->name;
        $info->title       = $request->title;
        $info->description = $request->description;
        $info->keywords    = $request->keywords;
        $info->logostatus  = $request->logostatus;
        $info->poweredby   = $request->poweredby;

        // save data in database

        $info->save();

        return redirect()->back()->with('message','Data Has Been Updated Successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
