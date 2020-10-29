@extends('layouts.admin.index')

@section('title')
Cities Prefixes
@endsection




@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 border-left-primary p-3">Cities Prefixes</h1>
</div>
  <div>

    @if(session()->has('message'))
    <div class="alert alert-primary" role="alert">
    {{session()->get('message')}}
    </div>
    @endif


    <table class="table">
        <thead class="bg-primary" style="color:white;text-align:center">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Language</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody style="background: white;text-align:center">
          <tr>


            @foreach ($citiesPrefix as $prefix)

          <th scope="row"><a href="#">#{{$prefix->id}}</a></th>

            <td>
              {{$prefix->language}}
            </td>


            <td class="text-center">


            <a href="{{route('city-prefix.edit',$prefix->id)}}" class="btn btn-success btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-pencil-alt"></i>
                </span>
                <span class="text">EDIT</span>
            </a>
            <span class="btn btn-danger btn-icon-split btn-sm">
                <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
                <form method="POST" action="{{route('city-prefix.destroy',$prefix->id)}}" class="d-inline">
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


      {{-- $countries->links('pagination::bootstrap4') --}}

  </div>



@endsection
