<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Supplier Forgot Password</title>

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
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password ?</h1>
                    <br>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username">
                    </div>
                    <a href=" {{url('supplier_login')}} " class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href=" {{url('supplier_register')}} ">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{url('supplier_login')}} ">Already have an account? Login!</a>
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
