@extends('theme/main_supplier')

@section('title','My Profile')

@section('content')


<div class="container mt-2" style="border:2px solid #7f0794;">

  <h1><center>MyProfile Update</center></h1>
                      <form class="user" method="post" action=" {{URL::TO('MyProfileUpdatefunction')}} " enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                    <span class="heading">Full Name :</span>
                    <input type="text" name="supplier_name"  class="form-control form-control-user" id="exampleFirstName" value="{{$res[0]->supplier_name}}">
                    </div>

                    <div class="form-group">
                    <span class="heading">Contact Number :</span>
                    <input type="integer" name="phone" class="form-control form-control-user" id="examplePhoneNumber" value="{{$res[0]->phone}}">
                    </div>
                    <div class="form-group">
                    <span class="heading">Email ID / Username :</span>
                    <input type="email" name="supplier_email" class="form-control form-control-user" id="exampleInputEmail" value="{{$res[0]->supplier_email}}" disabled>
                    </div>
                    <div class="form-group">
                    <span class="heading">Password :</span>
                    <input type="text" name="supplier_password" class="form-control form-control-user" id="exampleInputPassword" value="{{$res[0]->supplier_password}}">
                    </div>

                    <input type="submit" value="Update" class="btn btn-primary btn-user mb-2" style="margin-left:30%;">

                    </form>
</div>
<br>
@endsection
