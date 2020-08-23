@extends('theme/main')

@section('title','My Profile')

@section('content')


<div class="container mt-2" style="border:2px solid #7f0794;">

  <h1><center>MyProfile Update</center></h1>
                      <form class="user" method="post" action=" {{URL::TO('MyProfileUpdatefunction')}} " enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                    <span class="heading">Photo :</span>
                    <br>
                    <input type="file" name="cust_photo" id="examplePhoto" >
                    </div>
                    <div class="form-group">
                    <span class="heading">Full Name :</span>
                    <input type="text" name="cust_name"  class="form-control form-control-user" id="exampleFirstName" value="{{$res[0]->cust_name}}">
                    </div>

                    <div class="form-group">
                    <span class="heading">Contact Number :</span>
                    <input type="integer" name="cust_phone" class="form-control form-control-user" id="examplePhoneNumber" value="{{$res[0]->cust_phone}}">
                    </div>
                    <div class="form-group">
                    <span class="heading">Email ID / Username :</span>
                    <input type="email" name="cust_email" class="form-control form-control-user" id="exampleInputEmail" value="{{$res[0]->cust_email}}" disabled>
                    </div>
                    <div class="form-group">
                    <span class="heading">Password :</span>
                    <input type="text" name="cust_password" class="form-control form-control-user" id="exampleInputPassword" value="{{$res[0]->cust_password}}">
                    </div>
                    <div class="form-group">
                    <span class="heading">Home Address :</span>
                    <input type="text" name="cust_home_addr" class="form-control form-control-user" id="exampleHomeAddress" value="{{$res[0]->cust_home_addr}}">
                    </div>
                    <div class="form-group">
                    <span class="heading">Office Address :</span>
                    <input type="text" name="cust_office_addr" class="form-control form-control-user" id="exampleOfficeAddress" value="{{$res[0]->cust_office_addr}}">
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary btn-user mb-2" style="margin-left:30%;">

                    </form>
</div>
<br>
@endsection
