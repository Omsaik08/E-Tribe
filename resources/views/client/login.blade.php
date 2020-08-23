<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('client/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('client/css1/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5" style="width:70%;margin-left:15%;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row-sm">

              <div class="col-sm">
                <div class="p-5">

                  <form class="user" method="post" action="{{url('checkLogin')}}">
					{{csrf_field()}}
                    <div class="form-group">
					  <span class="heading">Username</span>
                      <input type="email" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username"  >
                    </div>
                    <div class="form-group">
						<span class="heading">Password</span>
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck" style="color:#7f0794">Remember Me</label>
                      </div>
                    </div>



					<div class="form-group text-center">
						<div class="captcha">
						<span style="position: relative;top: -9px;" class="text-center">{!! captcha_img() !!}</span>
						
						<a class="btn btn-light" onclick='window.location.reload(true);' style="top: -5px;"><i class="icon-refresh"></i> Refresh</a>
						</div>
						<!--<input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">-->
						<input type="text" name="captcha" class="form-control form-control-user" id="captcha" placeholder="Enter Captcha">
						@if ($errors->has('captcha'))
							<span class="help-block">
							<strong>{{ $errors->first('captcha') }}</strong>
							</span>
						@endif
						
						
					</div>



                      <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">

                    <hr>
                    <a href="index.html" class="btn btn-google btn-user " style="border-radius:1rem">
                      <i class="fab fa-google fa-fw"></i>
                    </a>

					<a href="index.html" class="btn btn-facebook btn-user" style="margin-left:20px;" >
                      <i class="fab fa-facebook-f fa-fw"></i>
                    </a>

					<a href="index.html" class="btn btn-twitter btn-user" style="margin-left:20px;" >
						<i class="fab fa-twitter fa-fw"></i>
					</a>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href=" {{url('/forgot_password')}} ">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href=" {{url('/register')}} ">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


</body>

</html>
