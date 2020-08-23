@extends('theme/main')
@section('content')
<div class="container">
		<!-- Home -->


	<!-- Products -->
	<br><br><br><br>
	<div class="products">
					<div class="row">

						
						@foreach ($data as $i)
						<div class="col-sm-4">
								<!-- Product -->
								<div class="product grid-item hot">
									<div class="product_inner">
										<div class="product_image">

											<a href="{{asset('productcategoryimages/Paintings/'.$i->supplier_id.'/'.$i->image)}}">
												<img src="{{asset('productcategoryimages/Paintings/'.$i->supplier_id.'/'.$i->image)}}" style="width:270px;height:183px"  alt="">
											</a>

										</div>
										<div class="product_content text-center">
											<div class="product_title">{{$i->product_name}}</div>
											<div class="product_price">{{$i->price}}</div>
											<a href="{{url('login')}}"><span class="btn btn-primary">SHOP</span></a>
											
										</div>
									</div>
								</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
@endsection
