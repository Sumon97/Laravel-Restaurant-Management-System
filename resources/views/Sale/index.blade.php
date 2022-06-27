@extends('layouts.admin')

@section('Law Diary', 'Change the way')


@section('content')

  <form role="form text-left" method="Post" action="" enctype="multipart/form-data">
                           @csrf
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Client Name<span style="color:red;"> &#42; </span> </label>
                              <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Client Adress</label>
                              <input type="text" name="address" class="form-control" id="exampleFormControlInput1">
                            </div>
                          </div>
                        </div>

                       <div class="three fields fieldGroup">
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group  field product-type">
                              <label>Food Item</label>
                              <select name="item" class="form-control" id="exampleFormControlInput1">
                                 <option>Select Food</option>
                                 @foreach($items as $item)
                                <option data-price="{{$item->price}}">{{$item->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group  field">
                              <label>Size</label>
                              <input type="text" name="size" class="form-control" id="exampleFormControlInput1">
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group  field">
                              <label>Quantity</label>
                              <input type="number" name="quantity" onblur="calculate()" id="qty" class="form-control quantity" onkeyup="quantity(this)" id="exampleFormControlInput1" value="1">
                            </div>
                          </div>

                          <div class="col-md-1">
                            <div class="form-group  field">
                              <label>Unit Price</label>
                              <input type="text" name="unit" onblur="calculate()"  id="unit" class="form-control rate_unit price-input" onkeyup="unit(this)" id="exampleFormControlInput1">
                            </div>
                          </div>

                          <div class="col-md-1">
                            <div class="form-group  field">
                              <label>Total Price</label>
                              <input type="text" name="price" id="price" class="form-control price-input sumUnit" id="exampleFormControlInput1">
                            </div>
                          </div>
                        </div>
                      </div>
                         <button href="javascript:void(0)" class="ui primary right floated button addMore" type="button"> 
      Add more
    </button>
                      
                       
                   
                            <div class="text-center">
                              <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Submit</button>
                            </div>
                        </form>







<script type="text/javascript">

calculate = function()
{
    var a = document.getElementById('qty').value;
    var b = document.getElementById('unit').value; 
    document.getElementById('price').value = parseInt(a)*parseInt(b);
     
   }


</script>



<script>
$('.product-type').on('change', function() {
  $('.price-input')
  .val(
    $(this).find(':selected').data('price')
  );
});

</script>









<script >
  function unit(unit){
    var regex=/^[0-9]+$/;
    if(!unit.value.match(regex)){
        unit.value = unit.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(unit).parents(".fieldGroup");
        var rate_unit   = fieldGroup.find(".rate_unit").val();
        var quantity    = fieldGroup.find(".quantity").val();
        quantity = parseInt(quantity);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(rate_unit*quantity);
    }
}

function quantity(quantity){
    var regex=/^[0-9]+$/;
    if(!quantity.value.match(regex)){
        quantity.value = quantity.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(quantity).parents(".fieldGroup");
        var rate_unit   = fieldGroup.find(".rate_unit").val();
        var quantity    = fieldGroup.find(".quantity").val();
        quantity = parseInt(quantity);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(rate_unit*quantity);
    }
}




$(document).ready(function(){
    //group add limit
    var maxGroup = 20;





    
    //add more fields group
    $(".addMore").click(function(){

  $('.product-type').on('change', function() {
  $('.price-input')
  .val(
    $(this).find(':selected').data('data-price')
  );
});
      //alert($('form').find('.ui.form').length);
        if($('form').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="three fields fieldGroup"><div class="row"><div class="col-md-2"><div class="form-group field product-type"><label>Food Item</label><select name="item" class="form-control" id="exampleFormControlInput1"><option>Select Food</option>@foreach($items as $item)<option data-price="{{$item->price}}">{{$item->name}}</option>@endforeach</select></div></div><div class="col-md-2"><div class="form-group  field"><label>Size</label><input type="text" name="unit" class="form-control" id="exampleFormControlInput1"></div></div><div class="col-md-2"><div class="form-group  field"><label>Quantity</label><input type="number" name="qty" onblur="calculate()" id="qty" class="form-control quantity" id="exampleFormControlInput1" value="1"></div></div><div class="col-md-1"><div class="form-group  field"><label>Unit Price</label><input type="text" name="unit" onblur="calculate()"  id="unit" class="form-control rate_unit price-input" id="exampleFormControlInput1"></div></div><div class="col-md-1"><div class="form-group  field"><label>Total Price</label><input type="text" name="price" id="price" class="form-control price-input sumUnit" id="exampleFormControlInput1"><button class="ui remove button" href="javascript:void(0)"><i class="minus icon"></i></button></div></div></div>';


            $('form').find('.fieldGroup:last').after(fieldHTML);

        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });




    
    //remove fields group
    $('form').on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});
</script>

@endsection