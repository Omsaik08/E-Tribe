@extends('theme/main')

@section('title','Homepage')

@section('content')

    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>

    <div class="content mt-4">
		<!-- Home -->

	<div class="home">
		<!-- Home Slider -->
			<div class="home_slider_container">
				<div class="owl-carousel owl-theme home_slider">

					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url({{asset('client/images/50.jpg')}})"></div>
						<div class="home_content_container">
							<div class="home_content">
								<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								</div>
								<div class="home_title" >20 % Discount on the <br>New Handcrafts Collection  </div>
								<div class="button button_1 home_button trans_200"><a href="#gotoproducts">Shop</a></div>
							</div>
						</div>
					</div>

					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url({{asset('client/images/72.jpg')}})"></div>
						<div class="home_content_container">
							<div class="home_content">
								<div class="home_title" style="color:black;">20 % Discount on the <br>New Arts Collection  </div>
								<div class="button button_1 home_button trans_200"><a href="#gotoproducts">Shop</a></div>
							</div>
						</div>
					</div>

					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url({{asset('client/images/82.jpg')}})"></div>
						<div class="home_content_container">
							<div class="home_content">
								<div class="home_title" style="color:white;">20 % Discount on the <br>New Paintings Collection  </div>
								<div class="button button_1 home_button trans_200"><a href="#gotoproducts">Shop</a></div>
							</div>
						</div>
					</div>

                    <!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url({{asset('client/images/arts13.jpg')}})"></div>
						<div class="home_content_container">
							<div class="home_content">
								<div class="home_title" style="color:black;">20 % Discount on the <br>New Forest Products Collection  </div>
								<div class="button button_1 home_button trans_200"><a href="#gotoproducts">Shop</a></div>
							</div>
						</div>
					</div>

				</div>

				<!-- Home Slider Navigation -->
				<div class="home_slider_nav home_slider_prev trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="{{asset('client/images/prev.png')}}" alt=""></div></div>
				<div class="home_slider_nav home_slider_next trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="{{asset('client/images/next.png')}}" alt=""></div></div>

			</div>
		</div>


        <span class="span_title">PRODUCT CATEGORIES : </span>

        <!-- Boxes -->
		<div class="boxes" style="margin-top:80px;padding-top:0px;">
			<div class="section_container">
				<div class="container">
					<div class="row">
						<!-- Box -->
						<div class="col-lg-5 ml-5 box_col">
							<div class="box">
								<div class="box_image"><img src="{{asset('client/images/70.jpg')}}" style="width:450px;height:400px" alt=""></div>
								<div class="box_title trans_200"><a href="{{url('/handcrafts')}}">Handcrafts Collection</a></div>
							</div>
						</div>

                        <!-- Box -->
						<div class="col-lg-5 ml-5 box_col">
							<div class="box">
								<div class="box_image"><img src="{{asset('client/images/paintings.jpg')}}" style="width:450px;height:400px" alt=""></div>
								<div class="box_title trans_200"><a href="{{url('/paintings')}}">Paintings Product Collection</a></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>




        <!-- Boxes -->
		<div class="boxes mt-5">
			<div class="section_container">
				<div class="container">
					<div class="row">
						<!-- Box -->
						<div class="col-lg-5 ml-5 box_col">
							<div class="box">
								<div class="box_image"><img src="{{asset('client/images/31.jpg')}}" style="width:450px;height:400px" alt=""></div>
								<div class="box_title trans_200"><a href="{{url('/arts')}}">Arts Collection</a></div>
							</div>
						</div>

                        <!-- Box -->
						<div class="col-lg-5 ml-5 box_col">
							<div class="box">
								<div class="box_image"><img src="{{asset('client/images/forest1.jpg')}}" style="width:450px;height:400px" alt=""></div>
								<div class="box_title trans_200"><a href="{{url('/forest_products')}}">Forest Product Collection</a></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>





        <br><br><br><br>


        <span class="span_title" id="gotoproducts" >ALL PRODUCTS : </span><br><br>

		<!-- Products -->
    <div class="row mt-5" >


    @for($i=0;$i<count($data);$i++)

    <div class="col-sm-4">
        <!-- Product -->


                @if( strcmp($data[$i]->category_id,"1")==0 )
                <div class="product grid-item hot">
                    <div class="product_inner">
                            <div class="product_image">
                                <a href="{{url('product_details/'.$data[$i]->product_id)}}">
                                    <img src="{{asset('productcategoryimages/Handcrafts/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}"  alt="">
                                </a>
                            </div>
                            <div class="product_content text-center">
                                <div class="product_title">{{$data[$i]->product_name}}</div>
                                <div class="product_price">{{$data[$i]->price}}</div>
                                <div class="product_button ml-auto mr-auto trans_200">
                                    <a href="{{url('cartProduct/'.$data[$i]->product_id)}}">add to cart</a>
                                </div>
                            </div>
                    </div>
                </div>
                @elseif( strcmp($data[$i]->category_id,"2")==0 )
                <div class="product grid-item hot">
                  <div class="product_inner">
                    <div class="product_image">
                <a href="{{url('product_details/'.$data[$i]->product_id)}}">
                    <img src="{{asset('productcategoryimages/Arts/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}"  alt="">
                </a>
            </div>
            <div class="product_content text-center">
              <div class="product_title">{{$data[$i]->product_name}}</div>
              <div class="product_price">{{$data[$i]->price}}</div>
              <div class="product_button ml-auto mr-auto trans_200">
                  <a href="{{url('cartProduct/'.$data[$i]->product_id)}}">add to cart</a>
              </div>
            </div>
          </div>
        </div>

                @elseif( strcmp($data[$i]->category_id,"3")==0 )
                <div class="product grid-item hot">
                  <div class="product_inner">
                    <div class="product_image">
                <a href="{{url('product_details/'.$data[$i]->product_id)}}">
                    <img src="{{asset('productcategoryimages/Paintings/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}"  alt="">
                </a>
            </div>
            <div class="product_content text-center">
              <div class="product_title">{{$data[$i]->product_name}}</div>
              <div class="product_price">{{$data[$i]->price}}</div>
              <div class="product_button ml-auto mr-auto trans_200">
                  <a href="{{url('cartProduct/'.$data[$i]->product_id)}}">add to cart</a>
              </div>
            </div>
          </div>
        </div>

                @elseif( strcmp($data[$i]->category_id,"4")==0 )
                <div class="product grid-item hot">
                  <div class="product_inner">
                    <div class="product_image">
                <a href="{{url('product_details/'.$data[$i]->product_id)}}">
                    <img src="{{asset('productcategoryimages/Forest Products/'.$data[$i]->supplier_id.'/'.$data[$i]->image)}}"  alt="">
                </a>
            </div>
            <div class="product_content text-center">
              <div class="product_title">{{$data[$i]->product_name}}</div>
              <div class="product_price">{{$data[$i]->price}}</div>
              <div class="product_button ml-auto mr-auto trans_200">
                  <a href="{{url('cartProduct/'.$data[$i]->product_id)}}">add to cart</a>
              </div>
            </div>
          </div>
        </div>
                @endif
    </div>
    @endfor

  </div>



	</div>
@endsection
