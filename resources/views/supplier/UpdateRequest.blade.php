@extends('theme/main_supplier')

@section('title','Add Product')

@section('content')

  <div class="container mt-2">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-sm">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Update Request!</h1>
                <form class="user" method="post" action="{{action('RequestController@update',$request_id)}}" enctype="multipart/form-data">
              </div>
                {{ csrf_field() }}
                @method('patch')
                <div class="form-group">
          <span class="heading">Supplier Name :</span>
                    <input type="hidden" name="supplier_id" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name" value="{{$res['supplier_id']}}" >
                    <input type="text" name="supplier_name" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name" value="{{$supplier_name[0]->supplier_name}}" readonly>
                </div>
                <div class="form-group">
          <span class="heading">Product Name :</span>
                    <input type="text" name="product_name" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name" value="{{$res['product_name']}}" >
                </div>
                <div class="form-group">
                  <span class="heading">Product Image:</span>
                  <br>
                  <input name="product_image" type="file" id="examplePhoto" value="{{$res['product_image']}}" >
                        </div>

                        <div class="form-group">
                          <span class="heading">Category Type :</span>
                            <select name="category_name">
                            @for($i=0;$i<count($category_name);$i++)
                              <option value="{{$category_name[$i]->category_id}}">{{$category_name[$i]->category_name}}</option>
                            @endfor
                          </select>
                        </div>

        <div class="form-group">
          <span class="heading">Product Quantity :</span>
                    <input type="integer" name="product_quantity" class="form-control form-control-user"  placeholder="Product Quantity" value="{{$res['product_quantity']}}">
                </div>

                <div class="form-group">
          <span class="heading">Price For Single Quantity :</span>
          <input type="integer" name="price" class="form-control form-control-user"  placeholder="Prices" value="{{$res['price']}}">
                </div>
                <div class="form-group">
			        <button style="margin-left: 0rem;" class="btn btn-primary btn-user btn-block">
                  Update Request
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
