@extends('theme/main_admin')
@section('content')
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Update Product</title>

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
                <h1 class="h4 text-gray-900 mb-4">Update Products!</h1>
                <form class="user" method="post" action="{{action('ProductResource@update',$product_id)}}" enctype="multipart/form-data">
              </div>
                {{ csrf_field() }}
                @method('patch')
                    <div class="form-group">
					<span class="heading">Product Name :</span>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="product_name"  placeholder="Enter Product Name" value="{{$res['product_name']}}" >
                </div>
				<div class="form-group">
					<span class="heading">Product Quantity :</span>
                    <input type="integer" class="form-control form-control-user" id="examplePhoneNumber" name="quantity" placeholder="Enter Product Quantity" value="{{$res['quantity']}}">
                </div>
                <div class="form-group">
                  <span class="heading">Photo :</span>
                  <br>
                  <input name="image" type="file" id="examplePhoto" value="{{$res['image']}}">
                        </div>
                <div class="form-group">
                <span class="heading">Product Price :</span>
                    <input type="integer" class="form-control form-control-user" name="price" id="exampleInputPassword" placeholder="Enter Product Price" value="{{$res['price']}}">
                </div>
                <div class="form-group">
			        <button style="margin-left: 0rem;" class="btn btn-primary btn-user btn-block">
                  Update Product
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
