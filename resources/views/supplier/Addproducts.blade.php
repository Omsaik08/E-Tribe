@extends('theme/main_supplier')
@section('content')

<div class="container mt-2">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-sm">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">ADD A PRODUCT!</h1>
            </div>


            <form class="user"  method="post" action="{{ url('request') }}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group">
                          <span class="heading">Supplier Name :</span>
                          <input type="text" name="supplier_name" class="form-control form-control-user" id="examplePhoneNumber" value="{{$supplier_name[0]->supplier_name}}" readonly>
              </div>
              <div class="form-group">
                  <span class="heading">Product Name :</span>
                  <input type="text" name="product_name" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name"  required>
              </div>
              <div class="form-group">
                <span class="heading">Photo :</span>
                <input name="product_image" type="file" id="examplePhoto" required>
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
                  <input type="integer" name="product_quantity" class="form-control form-control-user" id="examplePhoneNumber" placeholder="Product Quantity" required>
              </div>

              <div class="form-group">
                  <span class="heading">Price :</span>
                  <input type="integer" name="price" class="form-control form-control-user" id="exampleInputEmail" placeholder="Prices" required>
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

@endsection
