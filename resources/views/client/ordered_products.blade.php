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
	font-size: initial;
}
</style>

<div class="container mt-2" >
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
					<div class="col-sm-2 " style="border-right:1px solid black;text-align:center">
						<span class="title">Product Image</span>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center">
						<span class="title">Product Name</span>
					</div>
					<div class="col-sm-1" style="border-right:1px solid black;text-align:center">
						<span class="title">Ordered Quantity</span>
					</div>
                    <div class="col-sm-1" style="border-right:1px solid black;text-align:center">
						<span class="title">Price</span>
					</div>
                    <div class="col-sm-2" style="border-right:1px solid black;text-align:center">
						<span class="title">Order Date</span>
					</div>
                    <div class="col-sm-2" style="border-right:1px solid black;text-align:center">
						<span class="title">Shipment Date</span>
					</div>
					<div class="col-sm-1">
						<span class="title">Status</span>
					</div>

				</div>



				@for($i=0;$i<count($res);$i++)

				<div class="row" style="border:1px solid black;font-weight:600;font-size: x-large;width:95%;">
					<div class="col-sm-2 pb-2" style="border-right:1px solid black;text-align:center;color:black;">
						<a href="{{asset('productcategoryimages/'.$res[$i]->category_name.'/'.$res[$i]->supplier_id.'/'.$res[$i]->image)}}">
							<img src="{{asset('productcategoryimages/'.$res[$i]->category_name.'/'.$res[$i]->supplier_id.'/'.$res[$i]->image)}}"
							style="margin:5px;width:80%;height:95%;">
						</a>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center;color:black;">
						<span class="title">{{$res[$i]->product_name}}</span>
					</div>
					<div class="col-sm-1" style="border-right:1px solid black;text-align:center;color:black;">
						<span class="title">{{$res[$i]->quantity}}</span>
					</div>
					<div class="col-sm-1" style="border-right:1px solid black;text-align:center;color:black;">
						<span class="title">{{$res[$i]->total_price}} Rs</span>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center;color:black;">
						<span class="title">{{$res[$i]->order_date}} </span>
					</div>
					<div class="col-sm-2" style="border-right:1px solid black;text-align:center;color:black;">
						<span class="title">{{$res[$i]->ship_date}} </span>
					</div>
					<div class="col-sm-1" style="text-align:center;color:black;">

						@if( date($res[$i]->ship_date)  < date("Y-m-d") )
							<span class="title" >DELIVERED</span>
				        @else
							<span class="title">PENDING</span>
				        @endif


					</div>


				</div>

				@endfor



			</div>
		</div>

	</div>

</div>


@endsection
