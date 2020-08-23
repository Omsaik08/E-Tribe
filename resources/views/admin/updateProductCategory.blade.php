@extends('theme/main_admin')
@section('content')

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Category</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('client/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-sm">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Update Categories!</h1>
              </div>
              <form class="user" method="post" action="{{action('AddProductCategory@update',$category_id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('patch')
                    <div class="form-group">
					<span class="heading">Category Name :</span>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="category_name"  placeholder="Enter Category Name" value="{{$res[0]->category_name}}" >
                </div>
				<div class="form-group">
					<span class="heading">Description :</span>
                    <input type="text" class="form-control form-control-user" id="examplePhoneNumber" name="description" placeholder="Enter Category Description" value="{{$res[0]->description}}">
                </div>
                <div class="form-group">
			        <button style="margin-left: 0rem;" class="btn btn-primary btn-user btn-block">
                  Update Category
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
