@extends('layouts.admin.index')

@section('title')
Cities
@endsection




@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 border-left-primary p-3">Cities</h1>
</div>
  <div>

    @if(session()->has('message'))
    <div class="alert alert-primary" role="alert">
    {{session()->get('message')}}
    </div>
    @endif


    <table class="table">
        <thead class="bg-primary" style="color:white">
          <tr>
            <th scope="col">#</th>
            <th scope="col">City</th>
            <th scope="col">Country</th>
            <th scoop="col">Status</th>
            <th scope="col">More info</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody style="background: white;">
          <tr>


            @foreach ($cities as $city )
          <th scope="row"><a href="#">#{{$city->id}}</a></th>
          <td>
              <div> {{$city->name_ar}} </div>
              <div> {{$city->name_en}} </div>

           </td>
           <td>
               <img src="{{asset('storage/images/flags/'.$city->country->flag)}}" alt="" style="height:40px; width:60px">
               <div> {{$city->country->name_en}} </div>
            </td>

        </td>

        <td style="font-size: 30px;">@if($city->status === 0) <i class="fas fa-eye-slash"></i> @else  <i class="fas fa-eye"></i>  @endif</td>




           <td>
            <div><span class="text-primary" style="width: 90px;display: inline-block;"> created at : </span><span style="font-size:12px; color:#1cc88a;">{{ $city->created_at }}</span> </div>
            <div><span class="text-primary" style="width: 90px;display: inline-block;"> updated at : </span><span style="font-size:12px; color:red;">{{$city->updated_at}}</span> </div>
         </td>
            <td class="text-center">


            <a href="{{ route('cities.edit',$city->id) }}" class="btn btn-success btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-pencil-alt"></i>
                    </span>
                    <span class="text">EDIT</span>
                  </a>


            <span class="btn btn-danger btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                   {{--<button type="button" class="deleteButton" data-toggle="modal" data-target="#exampleModal" > <span class="text">DELETE</span></button>--}}

                    <form method="POST" action="{{ route('cities.destroy',$city->id) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="deleteButton" > <span class="text">DELETE</span></button>
                    </form>

                </span>
            </td>
          </tr>

            @endforeach



        </tbody>
      </table>


      {{$cities->links('pagination::bootstrap4')}}





@endsection
