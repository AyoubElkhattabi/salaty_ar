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
            <th scope="col">country</th>
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



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sure to Delete City</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Select "Delete " below if you are sure to delete city.
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form method="POST" action="{{ route('cities.destroy',$city->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" > <span class="text">DELETE</span></button>
            </form>
            </div>
        </div>
        </div>
    </div>

@endsection
