@extends('layouts.front')

@section('Law Diary', 'Change the way')


@section('content')

@include('Inc.nav')

<div  id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" class="img-fluid" src="https://www.refrigeratedfrozenfood.com/ext/resources/NEW_RD_Website/DefaultImages/default-pasta.jpg?1430942591" width="100%" height="450px"  alt="Image">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_bQ9KJC7dY3u-aVOOwt-yot057YW44EhUnsPBo-p3_EoUNu2PYBVwO9xWIkCfvDeBI_I&usqp=CAU" class="img-fluid" width="100%" height="450px" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" class="img-fluid" src="https://img.freepik.com/free-photo/top-view-fast-food-mix-hamburger-doner-sandwich-chicken-nuggets-rice-vegetable-salad-chicken-sticks-caesar-salad-mushrooms-pizza-chicken-ragout-french-fries-mayo_141793-3997.jpg?size=626&ext=jpg" width="100%" height="450px" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" class="img-fluid" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@if(count($foods))
 <div class="container-fluid py-4">

      <div class="row g-3">
        @foreach($foods as $food)
        <div class="col-12 col-xl-3">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">{{$food->name}} </h6>
            </div>
            <div class="card-body p-3">
              <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive">
             <img class="img-fluid" src="{{asset('/storage/food/' . $food->photo) }}" style="border-radius: 15px;" width="280px" max-height="150px">
              </div>
              <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Price {{$food->price }}৳ </h6>
               <!-- start form from here -->
               <form role="form text-left" method="Post"  action="/Cart" enctype="form-data">
                 @csrf
                  <div class="row">
                          <div class="col-md-6">
                            <div class="form-group"> 
                              <input type="hidden" name="item_id" class="form-control" id="exampleFormControlInput1" value="{{$food->id}}">
                            </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                              <input type="hidden" name="total" class="form-control" id="exampleFormControlInput1" value="{{$food->price}}">
                            </div>
                          </div>
                        </div>
              
                 <button class="btn btn-success"> Add to Plate </button>
               

               </form>
              
            </div>
            </div>
            </div>
          </div> 
        </div>
@endforeach
      </div>
    </div>

@else

<p>There is no food yet.</p>

@endif


     


<!--
      <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl-3">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Dates Details</h6>
            </div>
            <div class="card-body p-3">
              <div class="table-responsive"> 
              
              <p>Total dates:  Times </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-3">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Fees Details</h6>
                </div>
              </div>
            </div>
            <div class="card-body p-3">

            <div class="table-responsive"> 
           
            <hr>
            <p>Total fee Collected:  BDT </p>
            </div>
            </div>
          </div>
        </div>

      </div>


    -->


@endsection