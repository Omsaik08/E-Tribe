@extends('theme/main')

@section('title','Product Details')

@section('content')


@if(session()->exists('message'))
	<script>
		alert("{{session()->get('message')}}")
	</script>
	{{session()->forget('message')}}
	{{session()->save()}}
@endif

<style>
.title{
	position: relative;
	height: 90%;
	width: 90%;
}
</style>

<div class="container mt-2">
	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('client/images/54.jpg')}}" data-speed="0.8" ></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Cart</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="index.html">Home</a></li>
						<li>Your Cart</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart -->

	<div class="cart_section">
		<div class="section_container" style="padding-left:0px;width:108%">
			<div class="container">
				<div class="row" style="
				    border: 1px solid black;
				background-color: #d871f9f7;
				font-size: x-large;
				font-weight: 600;
				color: black;width:95%;">
					<div class="col-sm-3" style="border-right:1px solid black;text-align:center">
						<span class="title">Product Image</span>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center">
						<span class="title">Product Name</span>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center">
						<span class="title">Price</span>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center">
						<span class="title">Available Quantity</span>
					</div>

                    <div class="col-sm-3">
						<span class="title">Order</span>
					</div>
				</div>



				@for($i=0;$i<count($res);$i++)

				<div class="row" style="border:1px solid black;font-weight:600;font-size: x-large;width:95%;">
					<div class="col-sm-3" style="border-right:1px solid black;text-align:center;color:black;">
						<a href="{{asset('productcategoryimages/'.$res[$i]->category_name.'/'.$res[$i]->supplier_id.'/'.$res[$i]->image)}}">
							<img src="{{asset('productcategoryimages/'.$res[$i]->category_name.'/'.$res[$i]->supplier_id.'/'.$res[$i]->image)}}"
							style="margin:5px;width:250px;height:200px;">
						</a>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center;color:black;">
						<span class="title">{{$res[$i]->product_name}}</span>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center;color:black;">
						<span class="title">{{$res[$i]->price}} Rs</span>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center;color:black;">
						<span class="title">{{$res[$i]->quantity}}</span>
					</div>

					<div class="col-sm-3">

						<span class="title"><a href="{{url('product_details/'.$res[$i]->product_id)}}"><button class="btn btn-primary btn-user btn-login mt-4 ml-3">Order Now</button></a></span>

						<span class="title"><a href="{{url('deleteCartProduct/'.$res[$i]->product_id)}}"><button class="btn btn-primary btn-user btn-login mt-4 ml-4">Delete</button></a></span>
					</div>
				</div>

				@endfor



			</div>
		</div>

	</div>

</div>


@endsection
