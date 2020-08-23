@extends('theme/main_admin')
@section('content')



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Product</title>

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
                <h1 class="h4 text-gray-900 mb-4">ADD A PRODUCT!</h1>
              </div>


              <form class="user"  method="post" action="{{ URL::to('product') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
        					<span class="heading">Supplier Name :</span>
                            <input type="hidden" name="supplier_id" class="form-control form-control-user" id="examplePhoneNumber" value="{{session()->get('sid')}}">
                            <input type="text" name="supplier_name" class="form-control form-control-user" id="examplePhoneNumber" value="{{$supplier_name[0]->supplier_name}}" readonly>
                </div>
                <div class="form-group">
					<span class="heading">Product Name :</span>
                    <input type="text" name="product_name" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name" >
                </div>
                <div class="form-group">
                  <span class="heading">Photo :</span>
                  <input name="image" type="file" id="examplePhoto" >
                        </div>

                  <div class="form-group">
                    <span class="heading">Category Type :</span>
                      <select name="category_name">
                      @foreach( $res as $i )
                        <option value="{{$i['category_id']}}">{{$i['category_name']}}</option>
                      @endforeach
                    </select>
                  </div>

				<div class="form-group">
					<span class="heading">Product Quantity :</span>
                    <input type="integer" name="quantity" class="form-control form-control-user" id="examplePhoneNumber" placeholder="Product Quantity ">
                </div>

                <div class="form-group">
					<span class="heading">Price :</span>
					<input type="integer" name="price" class="form-control form-control-user" id="exampleInputEmail" placeholder="Prices">
                </div>
                <button class="btn btn-primary btn-user btn-block " style="margin-left:0rem;">
                  ADD PRODUCT
              </button>
              </form>
            </div>
          </div>


        </div>
      </div>
    </div>

  </div>


</body>

</html>
@endsection
