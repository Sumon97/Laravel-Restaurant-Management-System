@extends('layouts.admin')

@section('Law Diary', 'Change the way')


@section('content')




 <div class="container-fluid py-4">

      <div class="row g-3">

        <div class="col-12 col-xl-11">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">{{$food->name}} </h6>
            </div>
            <div class="card-body p-3">
              <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive">
             <img class="img-fluid" src="{{asset('/storage/food/' . $food->photo) }}" style="border-radius: 15px;" width="680px" height="250px">
              </div>
              <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Price {{$food->price }}৳ </h6>
               <!-- start form from here -->
               <h6 class="mb-0">{{$food->description }} </h6>
                 <h6 class="mb-0">Type {{$food->Menu->name }} </h6>
              
            </div>
            </div>
            </div>
          </div> 
        </div>

      </div>
    </div>




@endsection