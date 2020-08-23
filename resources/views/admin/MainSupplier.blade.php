@extends('theme/main_admin')
@section('content')
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Suppliers</title>

  <!-- Custom fonts for this template -->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>
<body>

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Suppliers</h1>
              <a href="{{URL::TO('addsupplier')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Supplier</a>
            </div>
            <div id="wrapper">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="width: 100%;">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="200" cellspacing="5">
                            <thead>
                              <tr>
                                <th>Supplier ID</th>
                                <th>Supplier Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Update</th>
                                <th>Delete</th>
                              </tr>
                            </thead>

                            <tbody>
                              @foreach($supplier as $row)
                              <tr><td>{{$row['supplier_id']}}</td>
                                <td>{{$row['supplier_name']}}</td>
                                <td>{{$row['phone']}}</td>
                                <td>{{$row['supplier_email']}}</td>
                                <td>{{$row['supplier_password']}}</td>
                                <td>
                                  <a href="{{action('AddSupplierProduct@edit',$row['supplier_id'])}}"><button>Update</button></a></td>
                                <form name="f1" method="post" action="{{action('AddSupplierProduct@destroy',$row['supplier_id'])}}">
                                  @csrf
                                  @method('Delete')
                                <td><button onclick="return confirm('Do you want to continue ?')"  type="submit">Delete</button></td>
                              </form>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>



                          <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#">Next</a>
                            </li>
                          </ul>
                        </nav>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.container-fluid -->

                </div>

</body>
</html>
@endsection
