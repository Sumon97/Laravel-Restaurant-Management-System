@extends('layouts.admin')

@section('Law Diary', 'Change the way')


@section('content')


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total </p>
                    <h5 class="font-weight-bolder mb-0">
                  
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i style="color:white; font-size: 21px;" class="fas fa-users"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">This Month</p>
                    <h5 class="font-weight-bolder mb-0">
                      
                      <span class="text-success text-sm font-weight-bolder"> </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i style="color:white; font-size: 23px;" class="fas fa-user-tie"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">This Week</p>
                    <h5 class="font-weight-bolder mb-0">
                      
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i style="color:white; font-size: 23px;" class="far fa-file-alt"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Today</p>
                    <h5 class="font-weight-bolder mb-0">
                     
                      <span class="text-success text-sm font-weight-bolder">+5%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i style="color:white; font-size: 23px;" class="far fa-clock"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




       <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h5>Menu</h5>
              
              <button style="float: right; margin: -58px 0px 0px 0px;" type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new Menu</button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Ingredient</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <!-- start form from here -->
                        <form role="form text-left" method="Post" action="/Menu" enctype="form-data">
                           @csrf
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Name<span style="color:red;"> &#42; </span> </label>
                              <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name">
                            </div>
                          </div>
                        </div>

                            <div class="text-center">
                              <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
             
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Profession</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Education</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Listed</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                              
                            <img src=""  class="avatar avatar-sm me-3" alt="user1">
                       

                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"> <a href=""> </a> </h6>
                            <p class="text-xs text-secondary mb-0"></p>
                            <p class="text-xs text-secondary mb-0"></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"></p>
                        <p class="text-xs text-secondary mb-0"></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>

                       <td class=" ">
                        <a href=""  class="btn btn-sm bg-gradient-success" >
                          View
                        </a>
                      </td>
                      <td class=" ">

                        <form method="post" action="">
                          @csrf 
                          {{method_field('DELETE')}}
                          <input type="submit" value="Delete" onclick="return confirm('Are you sure that you want to Delete this client for ever? If you delete this client then everything will be deleted related of this client')" class="btn btn-sm  bg-gradient-danger"  />
                      </td>
                    </tr>
                  </tbody>
                 
                </table>
              
                <p style="margin: 0px 0px 0px 26px; color: #252f40; font-family:sans-serif;" > You have no client. Add a one and get started.</p>
              
              </div>
            </div>
          </div>
        </div>
      </div>


      </div>

      
      </div>



@endsection