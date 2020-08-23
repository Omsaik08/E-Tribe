@extends('theme/main_supplier')

@section('title','My Profile')

@section('content')


            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">My Profile</h1>

            </div>
            <div id="wrapper">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="width: 100%;">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="200" cellspacing="5">
                            <thead>
                            <tr>
                              <th>Supplier Name</th>
                              <th>Supplier Phone</th>
                              <th>Email</th>
							  <th>Password</th>
                              <th>Update</th>
                          </tr>
                            </thead>

                            <tbody>
                              @for( $i=0;$i<count($res);$i++ )

                              <tr>
							  <td>{{$res[$i]->supplier_name}}</td>
                                <td>{{$res[$i]->phone}}</td>
                                <td>{{$res[$i]->supplier_email}}</td>
                                <td>{{$res[$i]->supplier_password}}</td>
                                <td><a href="{{ URL::TO('myprofile_update') }}"><button class="btn btn-primary btn-user">Update</button></a></td>
                              </tr>
                              @endfor
                            </tbody>
                          </table>


                        </div>
                      </div>
                    </div>

                  </div>


@endsection
