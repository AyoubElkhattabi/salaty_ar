@extends('layouts.admin.index')

@section('title')
Add Country
@endsection




@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 border-left-primary p-3">Add Country</h1>
  </div>
  <div>
      {{-- The data has been successfully modified --}}
      @if(session()->has('message'))
      <div class="alert alert-primary" role="alert">
        {{session()->get('message')}}
      </div>
      @endif

      @if(count($errors)>0)
      <div class="alert alert-danger" role="alert">
        The data has not been modified please check your inputs rules
      </div>
      @endif

    <form method="POST" action="{{route('countries.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Arabic Name : </label>
            <div class="col-12 col-md-8">
            <input class=" form-control text-right direction-rtl" type="text" name="name_ar" placeholder="Arabic Name" value="">
            @error('name_ar')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>


        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> English Name : </label>
            <div class="col-12 col-md-8">
                <input class=" form-control" type="text" name="name_en" placeholder="English Name" value="">
                @error('name_en')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Time Zone : </label>
            <div class="col-12 col-md-8">
                <input class=" form-control" placeholder="timezone" type="text" name="timezone" value="">
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
                    <option hidden> -- Select Methode -- </option>
                    <option value="MWL">Muslim World League (MWL)</option>
                    <option value="ISNA">Islamic Society of North America (ISNA)</option>
                    <option value="EGYPT">Egyptian General Authority of Survey</option>
                    <option value="MAKKAH">Umm al-Qura University, Makkah</option>
                    <option value="KARACHI">University of Islamic Sciences, Karachi</option>
                    <option value="JAFARI">Shia Ithna-Ashari (Jafari)</option>
                    <option value="TEHRAN">Institute of Geophysics, University of Tehran</option>
                </select>
            @error('calcmethod')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Flag :  </label>
            <div class="col-12 col-md-8">
                <input  type="file"  name="flag" >
                @error('flag')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Country Status :  </label>
            <div class="col-12 col-md-8">
                <div class="">
                    <input type="radio" name="status" value="1" checked="">
                    <label>
                    Visible
                    </label>

                    <input type="radio" name="status" value="0">
                    <label>
                    Invisible
                    </label>

                </div>
            </div>
        </div>
        <div class="row m-3 py-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>
        </div>

      </form>
  </div>
@endsection
