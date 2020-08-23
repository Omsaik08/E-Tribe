@extends('theme/main')

@section('title','Order Details')

@section('content')

<div class="container mt-2" style="border:1px solid #7f0794">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">



            <!-- Nested Row within Card Body -->
            <div class="row-sm">

              <div class="col-sm">
                <div class="p-5">
                  <form class="user" method="post" action="{{url('order_details')}}">
                    {{csrf_field()}}
					<div class="form-group">
					  <span class="heading">Cutomer Name</span>
                      <input type="text" name="cust_name" class="form-control form-control-user"  aria-describedby="emailHelp" placeholder="{{$cust_name[0]->cust_name}}"   readonly>
                    </div>

                    <div class="form-group">
                        <span class="heading">Product Name</span> <!-- product name from product_id -->
                      <input type="number" name="product_name" class="form-control form-control-user"  placeholder="{{$res[0]->product_name}}" disabled>
                      <input type="hidden" name="product_id" class="form-control form-control-user"  aria-describedby="emailHelp" value="{{$res[0]->product_id}}"  readonly>
                    </div>

                    <div class="form-group">
                        <span class="heading">Price Per Single Product in Rs</span>
                      <input type="number" name="price" class="form-control form-control-user" id="c" value="{{$res[0]->price}}" readonly>
                    </div>

                    <div class="form-group">
                        <span class="heading">Available Quantity</span>
                      <input type="number" name="available_quantity" class="form-control form-control-user" id="b"  value="{{$res[0]->quantity}}"  readonly>
                    </div>

                    <div class="form-group">
                        <span class="heading">Quantity</span>
                      <input type="number" name="quantity" class="form-control form-control-user" id="a" onkeyup="calculate()" placeholder="Enter Quantity">
                    </div>

                    <div class="form-group">
                        <span class="heading">Total Price</span> <!-- product name from product_id -->
                      <input type="text" name="total_price" class="form-control form-control-user" id="tprice" placeholder="Total Price" readonly>
                    </div>

                    <div class="form-group">
                        <span class="heading">Shipment Date</span> <!-- product name from product_id -->
                      <input type="text" name="shipment_date" class="form-control form-control-user" id="sdate" placeholder="Shipment Date" readonly>
                    </div>

                      <input type="submit" class="btn btn-primary btn-user" value="Procedd To Bill">


                  </form>


                </div>
              </div>
            </div>


      </div>

    </div>

    <script>







    function calculate(){


        var a=document.getElementById('a').value;//quantity user
        var b=document.getElementById('b').value;//availproducts
        var c=document.getElementById('c').value;//per product price


        if( a <= b ){
            if( a>0 ){
                document.getElementById('tprice').value= a * c ;
            }
            else if(a<0){
                window.alert('Product quantity must be greater than zero');
                document.getElementById('a').value=1;
            }
        }
        else{
            window.alert(a+" product are not available");
            document.getElementById('a').value=1;
        }


        var future = new Date();
        future.setDate(future.getDate() + 7);
        var finalDate =
        future.getFullYear() +'-'+
        ((future.getMonth() + 1) < 10 ? '0' : '') + (future.getMonth() + 1) +'-'+
        future.getDate();
        var tempdate=new Date(finalDate).toDateString("dd-MM-yyyy");
        document.getElementById("sdate").value=tempdate;

    }

    </script>

</div>
  <br><br>

@endsection
