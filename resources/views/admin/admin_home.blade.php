@extends('theme/main_admin')

@section('title','Admin Homepage')

@section('content')

    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>

    <div class="content mt-4">
		<!-- Home -->

	<div class="row">
		@for($i=0;$i<count($data);$i++)

		<div class="col-sm-4">
			<!-- Product -->


					@if( strcmp($data[$i]->category_id,"1")==0 )
					<div class="product grid-item hot">
						<div class="product_inner">
								<div class="product_image">
									<a href="{{asset('productcategoryimages/Handcrafts/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}">
										<img src="{{asset('productcategoryimages/Handcrafts/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}"  style="height: 300px;width:300px;">
									</a>
								</div>
								<div class="product_content text-center">
									<div class="product_title">{{$data[$i]->product_name}}</div>
									<div class="product_price">{{$data[$i]->price}}</div>
									
								</div>
						</div>
					</div>
					@elseif( strcmp($data[$i]->category_id,"2")==0 )
					<div class="product grid-item hot">
					  <div class="product_inner">
						<div class="product_image">
							<a href="{{asset('productcategoryimages/Arts/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}">
								<img src="{{asset('productcategoryimages/Arts/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}"  alt="" style="height: 300px;width:300px;">
							</a>
						</div>
						<div class="product_content text-center">
						  <div class="product_title">{{$data[$i]->product_name}}</div>
						  <div class="product_price">{{$data[$i]->price}}</div>
						  
						</div>
					  </div>
					</div>

					@elseif( strcmp($data[$i]->category_id,"3")==0 )
					<div class="product grid-item hot">
					  <div class="product_inner">
						<div class="product_image">
							<a href="{{asset('productcategoryimages/Paintings/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}">
								<img src="{{asset('productcategoryimages/Paintings/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}"  alt="" style="height: 300px;width:300px;">
							</a>
						</div>
						<div class="product_content text-center">
						  <div class="product_title">{{$data[$i]->product_name}}</div>
						  <div class="product_price">{{$data[$i]->price}}</div>
						  
						</div>
					  </div>
					</div>

					@elseif( strcmp($data[$i]->category_id,"4")==0 )
					<div class="product grid-item hot">
					  <div class="product_inner">
						<div class="product_image">
						<a href="{{asset('productcategoryimages/Forest Products/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}">
							<img src="{{asset('productcategoryimages/Forest Products/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}"  alt="" style="height: 300px;width:300px;">
						</a>
						</div>
						<div class="product_content text-center">
						  <div class="product_title">{{$data[$i]->product_name}}</div>
						  <div class="product_price">{{$data[$i]->price}}</div>
						  
						</div>
					  </div>
					</div>
					@endif
		</div>
		@endfor
		</div>
  </div>


@endsection
