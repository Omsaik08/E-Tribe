<!DOCTYPE html>
<html lang="en">
<head>
<style>
	.box_title trans_200:hover{
	background:#c82fe2;
	}
</style>

<title>@yield('title','Supplier Home')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Custom fonts for this template-->
<link href="{{asset('client/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{asset('client/css1/sb-admin-2.min.css')}}" rel="stylesheet">


<!-- Custom styles for this template-->
<link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="{{asset('client/styles/cart.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('client/styles/cart_responsive.css')}}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="{{asset('client/styles/bootstrap-4.1.3/bootstrap.css')}}">
<link href="{{asset('client/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('client/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('client/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('client/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('client/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('client/styles/responsive.css')}}">


</head>
<body>

<div class="super_container">


	<div class="pt-2"></div>
	<div class="bs-example">
	<div class="btn-group">
			<button type="button" style="width:200px;left:-8%;" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"  >My Profile</button>
			<div class="dropdown-menu " >
					<a href="{{URL::TO('myaccount')}}" class="dropdown-item">My Account</a>
					<a href="{{url('/callAddProducts')}}" class="dropdown-item">Request To Add</a>
					<a href="{{url('/request')}}" class="dropdown-item">Requested Products</a>
					<div class="dropdown-divider"></div>
					<a href="{{URL::TO('logout')}}" class="dropdown-item">LogOut</a>
			</div>
	</div>

</div>
	<!-- Sidebar -->

	<div class="sidebar" >
		<!-- Logo -->
		<div class="sidebar_logo">
			<a href="{{url('supplier_homepage')}}"><div>E-<span>Tribe</span></div></a>
		</div>

		<!-- Sidebar Navigation -->
		<nav class="sidebar_nav" >
			<ul>
				<li><a href="{{url('/supplier_homepage')}}">home<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li><a href="{{url('/supplier_handcrafts')}}">Handcrafts<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li><a href="{{url('/supplier_arts')}}">Arts<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li><a href="{{url('/supplier_paintings')}}">Paintings<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li><a href="{{url('/supplier_forest_products')}}">Forest Products<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			</ul>
		</nav>


	</div>


		@yield('content')



	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="section_container">
				<div class="container">
					<div class="row">

						<!-- About -->
						<div class="col-xxl-3 col-md-6 footer_col">
							<div class="footer_about">
								<!-- Logo -->
								<div class="footer_logo" >
									<a href="{{url('supplier_homepage')}}"><div>E-<span style="color:white;">Tribe</span></div></a>
								</div>
								
							</div>
						</div>
					

						<!-- Questions -->
						<div class="col-xxl-3 col-md-6 footer_col">
							<div class="footer_questions">
								<div class="footer_title">questions</div>
								<div class="footer_list">
									<div>
									<ul>
										<li class="ulcolors"><a href="{{asset('supplier/#')}}">About us</a></li>
										<li class="ulcolors"><a href="{{asset('supplier/#')}}">Returns</a></li>
										<li class="ulcolors"><a href="{{asset('supplier/#')}}">Shipping</a></li>
										<li class="ulcolors"><a href="{{asset('supplier/#')}}">Partners</a></li>
										<li class="ulcolors"><a href="{{asset('supplier/#')}}">Support</a></li>
										<li class="ulcolors"><a href="{{asset('supplier/#')}}">Terms of Use</a></li>
									</ul>
									</div>
								</div>
							</div>
						</div>

						<!-- Contact -->
						<div class="col-xxl-3 col-md-6 footer_col">
							<div class="footer_contact">
								<div class="footer_title">contact</div>
								<div class="footer_contact_list">
									<div >
									<ul >
										<li class="d-flex flex-row align-items-start justify-content-start"><span>C.</span><div style="color: white;">WIT Solapur</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>A.</span><div style="color: white;">Ashok Chowk,near WIT college,Solapur</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>T.</span><div style="color: white;">+8484946271</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>E.</span><div style="color: white;">etribewebsite@gmail.com</div></li>
									</ul>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Social -->
		<div class="footer_social">
			<div class="section_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer_social_container d-flex flex-row align-items-center justify-content-between">
								<!-- Instagram -->
								<a href="{{asset('supplier/#')}}">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-instagram" aria-hidden="true"></i></div>
										<div class="footer_social_title">instagram</div>
									</div>
								</a>
								<!-- Google + -->
								<a href="{{asset('supplier/#')}}">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-google-plus" aria-hidden="true"></i></div>
										<div class="footer_social_title">google +</div>
									</div>
								</a>
								<!-- Facebook -->
								<a href="{{asset('supplier/#')}}">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-facebook" aria-hidden="true"></i></div>
										<div class="footer_social_title">facebook</div>
									</div>
								</a>
								<!-- Twitter -->
								<a href="{{asset('supplier/#')}}">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
										<div class="footer_social_title">twitter</div>
									</div>
								</a>
								<!-- YouTube -->
								<a href="{{asset('supplier/#')}}">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-youtube" aria-hidden="true"></i></div>
										<div class="footer_social_title">youtube</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Credits -->
		<div class="credits">
			<div class="section_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="credits_content d-flex flex-row align-items-center justify-content-end">
								<div class="credits_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved<i class="fa fa-heart-o" aria-hidden="true"></i>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</footer>



<script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('client/styles/bootstrap-4.1.3/popper.js')}}"></script>
<script src="{{asset('client/styles/bootstrap-4.1.3/bootstrap.min.js')}}"></script>
<script src="{{asset('client/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('client/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('client/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('client/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('client/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('client/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('client/plugins/easing/easing.js')}}"></script>
<script src="{{asset('client/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('client/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('client/plugins/Isotope/fitcolumns.js')}}"></script>
<script src="{{asset('client/js/custom.js')}}"></script>

<script src="{{asset('client/js/cart.js')}}"></script>


</body>
</html>
