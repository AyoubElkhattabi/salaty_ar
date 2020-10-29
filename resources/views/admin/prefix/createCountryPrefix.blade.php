@extends('layouts.admin.index')

@section('title')
Add Prefix Country
@endsection


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 border-left-primary p-3">Add Prefix Country</h1>
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

    <form method="POST" action="{{route('country-prefix.store')}}">
        @csrf
        <div class="row m-3 py-3">
            <label class="col-12 col-md-2">language : </label>
            <div class="col-12 col-md-8">
            <input class=" form-control" placeholder="Prefix Language" type="text" name="language" value="{{old('language')}}">
            @error('language')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2">title : </label>
            <div class="col-12 col-md-8">
            <input class=" form-control" placeholder="Title" type="text" name="title" value="{{old('title')}}">
            @error('title')
            <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
            @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Description : </label>
            <div class="col-12 col-md-8">
                <textarea class="form-control"  name="description" maxlength="160" rows="4" >{{old('description')}}</textarea>
                @error('description')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>

        <div class="row m-3 py-3">
            <label class="col-12 col-md-2"> Keywords : </label>
            <div class="col-12 col-md-8">
                <textarea class="form-control"  name="keywords" maxlength="255" rows="5">{{old('keywords')}}</textarea>
                @error('keywords')
                <small class="small-error" > <i class="fas fa-exclamation-triangle"> {{ $message }}</i></small>
                @enderror
            </div>
        </div>





        <div class="row m-3 py-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>
        </div>

      </form>
  </div>
@endsection
