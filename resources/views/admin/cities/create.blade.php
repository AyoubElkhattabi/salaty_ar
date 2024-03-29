@extends('layouts.admin.index')

@section('title')
Add City
@endsection




@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 border-left-primary p-3">Add City</h1>
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

    <form method="POST" action="{{route('cities.store')}}">
        @csrf

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Country : </label>
            <div class="col-12 col-md-8">
                <select class="form-control" name="country_id">
                    <option hidden value="">-- Select Country --</option>
                        @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name_en}}</option>
                        @endforeach
                  </select>
            @error('countryid')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>



        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Arabic Name  : </label>
            <div class="col-12 col-md-8">
            <input class=" form-control text-right direction-rtl" placeholder="Name Of City In Arabic" type="text" name="name_ar" value="">
            @error('name_ar')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> English Name : </label>
            <div class="col-12 col-md-8">
            <input class=" form-control" placeholder="Name Of City In English" type="text" name="name_en" value="">
            @error('name_en')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Specific Time Zone : </label>
            <div class="col-12 col-md-8">
                <input class=" form-control" placeholder="Specific timezone" type="text" name="timezone" value="">
                <a href="https://www.php.net/manual/en/timezones.php" target="_blank">timezone List</a>

            @error('timezone')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Coordinates: : </label>
            <div class="col-12 col-md-8 d-flex flex-column">

                <input class=" form-control my-1" placeholder="Latitude ° N" type="text" name="latitude" maxlength="60" value="">
                @error('latitude')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror

                <input class=" form-control my-1" placeholder="Longitude ° W" type="text" name="longitude" maxlength="60" value="">
                @error('longitude')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror

            </div>
        </div>


        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Space : </label>
            <div class="col-12 col-md-8">
                <input class=" form-control" placeholder="Space" type="state" name="space" maxlength="60" value="">
                @error('space ')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Population : </label>
            <div class="col-12 col-md-8">
                <input class=" form-control" placeholder="Population" type="text" name="population" maxlength="60" value="">
                @error('population')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>


        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> City Status :  </label>
            <div class="col-12 col-md-8">
                <div class="">
                    <input type="radio" name="status" value="1" checked>
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
