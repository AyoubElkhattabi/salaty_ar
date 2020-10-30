@extends('layouts.admin.index')

@section('title')
Edit Country
@endsection




@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 border-left-primary p-3">Edit Country</h1>
  </div>
  <div>
      {{-- The data has been successfully modified --}}
      @if(session()->has('message'))
      <div class="alert alert-primary" role="alert">
        {{session()->get('message')}}
      </div>
      @endif
{{-- this alert just for invalid flag --}}
      @if(session()->has('messageError'))
      <div class="alert alert-danger" role="alert">
        {{session()->get('messageError')}}
      </div>
      @endif


      @if(count($errors)>0)
      <div class="alert alert-danger" role="alert">
        The data has not been modified please check your inputs rules
      </div>
      @endif

    <form method="POST" action="{{route('countries.update',$country->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Arabic Name : </label>
            <div class="col-12 col-md-8">
            <input class=" form-control text-right direction-rtl" type="text" name="name_ar" value="{{$country->name_ar}}">
            @error('name_ar')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>


        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> English Name : </label>
            <div class="col-12 col-md-8">
                <input class=" form-control" type="text" name="name_en" value="{{$country->name_en}}">
                @error('name_en')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>


        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Time Zone : </label>
            <div class="col-12 col-md-8">
            <input class=" form-control" placeholder="timezone" type="text" name="timezone" value="{{$country->timezone}}">
            <a href="https://www.php.net/manual/en/timezones.php" target="_blank">timezone List</a>
            @error('timezone')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>



        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Calculation Method : </label>
            <div class="col-12 col-md-8">
                <select class="form-control" name="calcmethod">
                    <option hidden>-- Select Methode --</option>
                    <option value="MWL" @if($country->calcmethod =='MWL') selected @endif>Muslim World League (MWL)</option>
                    <option value="ISNA" @if($country->calcmethod =='ISNA') selected @endif >Islamic Society of North America (ISNA)</option>
                    <option value="Egypt" @if($country->calcmethod =='EGYPT') selected @endif >Egyptian General Authority of Survey</option>
                    <option value="Makkah" @if($country->calcmethod =='MAKKAH') selected @endif >Umm al-Qura University, Makkah</option>
                    <option value="Karachi" @if($country->calcmethod =='KARACHI') selected @endif >University of Islamic Sciences, Karachi</option>
                    <option value="Jafari" @if($country->calcmethod =='JAFARI') selected @endif >Shia Ithna-Ashari (Jafari)</option>
                    <option value="Tehran" @if($country->calcmethod =='TEHRAN') selected @endif >Institute of Geophysics, University of Tehran</option>
                </select>
            @error('calcmethod')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>



        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Title : </label>
            <div class="col-12 col-md-8">
                <input class=" form-control text-right direction-rtl" type="text" name="title" maxlength="60" value="{{$country->title}}">
                @error('title')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Description : </label>
            <div class="col-12 col-md-8">
                <textarea class="form-control text-right direction-rtl"  name="description" maxlength="160" rows="4" >{{$country->description}}</textarea>
                @error('description')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Keywords : </label>
            <div class="col-12 col-md-8">
                <textarea class="form-control text-right direction-rtl"  name="keywords" maxlength="255" rows="5">{{$country->keywords}}</textarea>
                @error('keywords')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Current Flag :  </label>
            <div class="col-12 col-md-8">
                <input type="image" src="{{asset('storage/images/flags/'.$country->flag)}}" alt="" style="width:60px; height:40px;">
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Flag :  </label>
            <div class="col-12 col-md-8">
                <input  type="file" name="flag" >
                @error('flag')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>


        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Slug : </label>
            <div class="col-12 col-md-8">
                <input class=" form-control" type="text" name="slug" value="{{$country->slug}}">
                @error('slug')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>
        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Country Status :  </label>
            <div class="col-12 col-md-8">
                <div class="">
                    <input type="radio" name="status" value="1" @if($country->status===1) checked @endif>
                    <label>
                    Visible
                    </label>

                    <input type="radio" name="status" value="0" @if($country->status===0) checked @endif>
                    <label>
                    Invisible
                    </label>
                </div>
            </div>
        </div>


        <div class="row m-3 py-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">UPDATE</button>
        </div>

      </form>
  </div>
@endsection
