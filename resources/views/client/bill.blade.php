@extends('theme/main')

@section('title','Order Details')

@section('content')

<style>
    .inputClass{
    background-color: transparent;
    border: none;
    border-bottom: 1px solid black;
    width: auto;
    border-radius: 0px;
    }
    .heading{
        color: black;
        font-size: larger;
        font-weight: 600;
    }
    .inputClass:hover{
        background-color: transparent;
        box-shadow: none;
    }
    .inputClass::after{
        border:color:transparent;
        background-color: transparent;
        box-shadow: none;
    }



    * {box-sizing: border-box;}

    .img-zoom-container {
      position: relative;
    }

    .img-zoom-lens {
      position: absolute;
      width: 40px;
      height: 40px;
    }

    .img-zoom-result {
      border: 1px solid #d4d4d4;
      /*set the size of the result div:*/
      width: 300px;
      height: 300px;
    }


</style>

<script>
function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
</head>


<div class="container mt-2" style="border:1px solid #7f0794">




            <div class="row">
                <div class="col-4">
                    <div class="img-zoom-container">
                      <img id="myimage" onmouseenter="call()" src="{{asset('productcategoryimages/'.$res[0]->category_name.'/'.$res[0]->supplier_id.'/'.$res[0]->image)}}" style="margin-top:5%;width:340px;height:380px;">
                      <div id="myresult" class="img-zoom-result" style="position: relative;
    background-image: url(http://localhost:8000/productcategoryimages/Handcrafts/12/bg_1-1584711057.jpg);
    background-size: 2550px 2850px;
    background-position: -1565.74px -1236.09px;
    margin-left: 225%;
    margin-top: -107%;
    height: 22rem;
    display: none;
"></div>
                    </div>
                    <script>
                        function call(){
                            var x=document.getElementById('myresult');
                            imageZoom("myimage", "myresult");
                            x.style.display="block";
                        }

                    </script>
                </div>

              <div class="col-5" >
                <div class="p-5">

                    <form method="post" action="{{url('showBill')}}">
                          {{csrf_field()}}

                          <div class="form-group">
                            <span class="heading">Cutomer Name : </span>
                            <input type="text" name="cust_name" class="inputClass"  aria-describedby="emailHelp" value="{{$cust_name[0]->cust_name}}"   readonly>
                          </div>

                          <div class="form-group">
                              <span class="heading">Category Name : </span>
                             <input type="text" name="" class="inputClass"  value="{{$res[0]->category_name}}" readonly>
                         </div>

                          <div class="form-group">
                              <span class="heading">Product Name : </span> <!-- product name from product_id -->
                            <input type="text" name="product_name" class="inputClass"  value="{{$res[0]->product_name}}" readonly>
                            <input type="hidden" name="product_id" class="inputClass"  aria-describedby="emailHelp" value="{{$product_id}}"  readonly>
                          </div>

                          <div class="form-group">
                              <span class="heading">Quantity : </span>
                            <input type="number" name="quantity" class="inputClass" id="b"  value="{{$quantity}}"  readonly>
                          </div>

                          <div class="form-group">
                              <span class="heading">Total Price : </span>
                            <input type="number" name="total_price" class="inputClass" id="c" value="{{$total_price}}" readonly>
                          </div>

                          <div class="form-group">
                              <span class="heading">Ordered Date : </span> <!-- product name from product_id -->
                            <input type="text" name="order_date" class="inputClass" id="tprice" value="{{$ordered_date}}" readonly>
                          </div>

                          <div class="form-group">
                              <span class="heading">Shipment Date : </span> <!-- product name from product_id -->
                            <input type="text" name="shipment_date" class="inputClass" id="sdate" value="{{$ship_date}}" readonly>
                          </div>

                            <input type="submit" class="btn btn-primary btn-user" value="Proceed To payment">
                    </form>


                </div>
              </div>
      </div>



</div>
  <br><br>

@endsection
