@extends('theme/main')

@section('title','Product Details')

@section('content')

  <div class="container mt-2" style="border:2px solid #7f0794;">

		<div class="row p-5">
			<div class="col-sm-5" >
				<a href="{{asset('productcategoryimages/'.$cname[0]->category_name.'/'.$res[0]->supplier_id.'/'.$res[0]->image)}}" >
				<img src="{{asset('productcategoryimages/'.$cname[0]->category_name.'/'.$res[0]->supplier_id.'/'.$res[0]->image)}}" style="position:relative;width:100%;height:100%;" ></a>
			</div>
			<div class="p-4"></div>
			<div class="col-sm-5 ml-5" style="    border: 2px solid violet; box-shadow: 5px 5px 5px violet;">

                <div class="row mt-5 ml-1" style="font-size: x-large;color: black;font-weight: 600;">

					Product Name : {{$res[0]->product_name}}

                </div>
                <div class="row mt-5 ml-1" style="font-size: x-large;color: black;font-weight: 600;">

					Category Name : {{$cname[0]->category_name}}

                </div>
                <div class="row mt-5 ml-1" style="font-size: x-large;color: black;font-weight: 600;">

					Price : {{$res[0]->price}} Rs

                </div>
                <div class="row mt-5 ml-1 mb-5" style="font-size: x-large;color: black;font-weight: 600;">

					Available Quantity : {{$res[0]->quantity}}

				</div>

			</div>

        <a href="{{url('place_an_order/'.$res[0]->product_id)}}" class="btn btn-primary btn-user btn-block" style="width:25%;margin-top:2%;margin-left:30%;" >Place An Order</a>

		</div>

        <hr style="border:2px solid black">
        <hr style="border:2px solid black">

        <div class="container">

            <div class="row">
                @for($i=0;$i<count($similar_products);$i++)
                    <div class="col-sm-4">
                            <div class="product grid-item hot">
                              <div class="product_inner">
                                <div class="product_image">
                            <a href="{{url('product_details/'.$similar_products[$i]->product_id)}}">
                                <img src="{{asset('productcategoryimages/'.$cname[0]->category_name.'/'.$similar_products[$i]->supplier_id.'/'.$similar_products[$i]->image)}}"  alt="">
                            </a>
                            </div>
                            <div class="product_content text-center">
                              <div class="product_title">{{$similar_products[$i]->product_name}}</div>
                              <div class="product_price">{{$similar_products[$i]->price}}</div>
                              <div class="product_button ml-auto mr-auto trans_200">
                                  <a href="{{url('cartProduct/'.$similar_products[$i]->product_id)}}">add to cart</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>

                @endfor
            </div>

        </div>


  </div>
  <br><br>

@endsection
