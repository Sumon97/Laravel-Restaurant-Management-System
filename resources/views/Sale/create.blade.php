@extends('layouts.admin')

@section('Law Diary', 'Change the way')


@section('content')


<div class="container-fluid py-4">
   


      <!-- start form from here -->
      <form role="form text-left" method="Post" action="/Couriers" enctype="form-data">
             @csrf

          

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name<span style="color:red;"> &#42; </span> </label>
                  <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Phone<span style="color:red;"> &#42; </span> </label>
                 <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone">
              </div>
            </div>
          </div>



     

        

       <div class="container">
        <div class="row clearfix">
          <div class="col-md-14">
            <table class="table table-bordered table-hover table-responsive-xl" id="tab_logic">
              <thead>
                <tr>
                  <th class="text-center"> SL</th>
                  <th class="text-center"> Menu</th>
                  <th class="text-center"> Price </th>
                  <th class="text-center"> Qty </th>
                  <th class="text-center"> Total </th>
                </tr>
              </thead>
              <tbody>
                <tr id='addr0'>
                  <td>1</td>
    
     
                
            
       
                  <td> <select  name='item_id[]' id="food_id"  class="form-control" >
                        @foreach($items as $item) 
                        <option value="{{$item->id}}" data-section1="{{$item->menu_id}}">{{$item->name}}</option>
                        @endforeach
                </select></td>


                   <td><input type="number" name='price[]' placeholder='000' class="form-control price" </td> 


                 

                    <td><input type="number" name='qty[]' placeholder='0' class="form-control qty" step="1" min="0"/></td> 

                  <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                </tr>
                <tr id='addr1'></tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-md-12">
            <a id="add_row" class="btn btn-default pull-left">Add Row</a>
            <a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
          </div>
        </div>
  

       

        <div>
          <h5 style="text-align:center; font-family:serif;"> Accounting</h5>
          <hr>
        </div>

        <div class="row clearfix" style="margin-top:20px; align-content: ">
            <div class="pull-right col-md-4">
              <table class="table table-bordered table-hover" id="tab_logic_total">
                <tbody>
                  <tr>
                    <th class="text-center">Sub Total</th>
                    <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                  </tr>
                  <tr>
                    <th class="text-center">CGST</th>
                    <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                        <input type="number" name='tax_rate' class="form-control" id="tax1" value="15" readonly>
                        <div class="input-group-addon">%</div>
                      </div></td>
                  </tr>
                  <tr>
                    <th class="text-center">CGST Tax Amount</th>
                    <td class="text-center"><input type="number" name='tax' id="tax_amount" placeholder="0.0" class="form-control" readonly/></td>
                  </tr>

        

                  <tr>
                    <th class="text-center">Grand Total</th>
                    <td class="text-center"><input  name='amount' id="total_amount"  class="form-control" /></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

              <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Submit</button>
              </div>
          </form>
           


</div>









<!-- write js code to generate sub total tax & total -->











@endsection

