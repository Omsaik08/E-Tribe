@extends('theme/main_admin')
@section('content')
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Supplier Product</title>


  <link href="{{asset('client/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">

        <div class="row">
          <div class="col-sm">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add Supplier Product!</h1>
              </div>
              <form class="user" method="post" action="{{URL::to('Supplier')}}">
                {{ csrf_field() }}
                    <div class="form-group">
					<span class="heading">Supplier Name :</span>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="supplier_name"  placeholder="Enter Supplier Name" >
                </div>
				<div class="form-group">
					<span class="heading">Contact Number :</span>
                    <input type="integer" class="form-control form-control-user" id="examplePhoneNumber" name="ContactNumber" placeholder="Enter Contact Number">
                </div>
                <div class="form-group">
					<span class="heading">Email ID / Username :</span>
					<input type="email" class="form-control form-control-user" id="exampleInputEmail" name="supplier_email" placeholder="Email Address">
                </div>
                <div class="form-group">
                <span class="heading">Password :</span>
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Enter Password">
                </div>
                <div class="form-group">
			        <button style="margin-left: 0rem;" class="btn btn-primary btn-user btn-block">
                  Add Supplier
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
@endsection
