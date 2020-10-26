@extends('layouts.admin.index')

@section('title')
Edit Config
@endsection




@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 border-left-primary p-3">Site Infos</h1>
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

    <form method="POST" action="{{route('info.update',1)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Name : </label>
                <div class="col-12 col-md-8">
                    <input class=" form-control text-right direction-rtl" type="text" name="name" value="{{$infos->name}}">
                    @error('name')
                    <small class="small-error" > <i class="fas fa-exclamation-triangle"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Title : </label>
                <div class="col-12 col-md-8">
                    <input class="form-control text-right direction-rtl" type="text" name="title" maxlength="60" value="{{$infos->title}}">
                    @error('title')
                    <small class="small-error" > <i class="fas fa-exclamation-triangle"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Description : </label>
                <div class="col-12 col-md-8">
                    <textarea class="form-control text-right direction-rtl"  name="description" rows="4" maxlength="160"> {{$infos->description}}</textarea>
                    @error('description')
                    <small class="small-error" > <i class="fas fa-exclamation-triangle"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Keywords : </label>
                <div class="col-12 col-md-8">
                    <textarea class="form-control text-right direction-rtl" name="keywords" rows="5" maxlength="255">{{$infos->keywords}}</textarea>
                    @error('keywords')
                    <small class="small-error" > <i class="fas fa-exclamation-triangle"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Image Logo :  </label>
                <div class="col-12 col-md-8">
                    <input class="" type="image" src="@if(is_null($infos->logo) || trim($infos->logo)=='' ) {{asset('storage/images/site/noimage.jpg')}} @else {{asset('storage/images/site/'.$infos->logo)}} @endif" alt="" style="max-height:200px; max-width: 200px;">

                </div>
            </div>

            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Change Logo :  </label>
                <div class="col-12 col-md-8">
                    <input class="" type="file" name="logo" id="">
                    @error('logo')
                    <small class="small-error" > <i class="fas fa-exclamation-triangle"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Logo Status :  </label>
                <div class="col-12 col-md-8">
                    <div class="">
                        <input  type="radio" name="logostatus" value="0" @if($infos->logostatus==0) checked @endif>
                        <label>
                        Disable
                        </label>
                        <input  type="radio" name="logostatus" value="1" @if($infos->logostatus==1) checked @endif>
                        <label>
                        Enable
                        </label>
                    </div>
                    @error('logostatus')
                    <small class="small-error" > <i class="fas fa-exclamation-triangle"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> favicon :  </label>
                <div class="col-12 col-md-8">
                    <input class="" type="image" src="@if(is_null($infos->favicon) || trim($infos->logo)=='') {{asset('storage/images/site/noimage.jpg')}} @else {{asset('storage/images/site/'.$infos->favicon)}} @endif" alt="" style="max-height:70px; max-width: 70px;">
                </div>
            </div>

            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Change favicon :  </label>
                <div class="col-12 col-md-8">
                    <input class="" type="file" name="favicon" id="">
                    @error('favicon')
                    <small class="small-error" > <i class="fas fa-exclamation-triangle"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row m-3 py-3">
                <label class="col-12 col-md-2"> Powered By : </label>
                <div class="col-12 col-md-8">
                    <input class="form-control" type="text"  name="poweredby" value="{{$infos->poweredby}}">
                    @error('poweredby')
                    <small class="small-error" > <i class="fas fa-exclamation-triangle"></i>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row m-3 py-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            </div>


      </form>
  </div>
@endsection
