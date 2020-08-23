@extends('theme/main_admin')

@section('title','Requested Products')

@section('content')


    @if( session()->exists('message') )

    <script>
        alert("{{session()->get('message')}}");
    </script>
    {{session()->forget('message')}}
    {{session()->save()}}

    @endif


        <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Requested Products</h1>
            </div>
            <div id="wrapper">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="width: 100%;">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="200" cellspacing="5">
                            <thead>
                            <tr>
                              <th>Request ID</th>
                              <th>Supplier ID</th>
                              <th>Supplier Name</th>
                              <th>Product Name</th>
                              <th>Product Image</th>
                              <th>Category Name</th>
                              <th>Product Quantity</th>
                              <th>Request Status</th>
                              <th>Price</th>
                              <th>Accept</th>
                              <th>Reject</th>
                            </tr>
                            </thead>

                            <tbody>
                              @for($i=0;$i<count($res);$i++)
                              <tr>
                                <td>{{$res[$i]->request_id}}</td>
                                <td>{{$res[$i]->supplier_id}}</td>
                                <td>{{$res[$i]->supplier_name}}</td>
                                <td>{{$res[$i]->product_name}}</td>
                                <td>{{$res[$i]->product_image}}</td>
                                <td>{{$res[$i]->category_name}}</td>
                                <td>{{$res[$i]->product_quantity}}</td>
                                <td>{{$res[$i]->price}}</td>
                                <td>{{$res[$i]->request_status}}</td>
                                <td>
                                  <a href="{{url('callShow/'.$res[$i]->request_id)}}"><button style="background-color:#4e73df;color:white;">Accept</button></a></td>
                                <form name="f1" method="post" action="{{action('RequestController@destroy',(string)$res[$i]->request_id.'a')}}">
                                  @csrf
                                  @method('Delete')
                                <td><button style="background-color:#4e73df;color:white;" onclick="return confirm('Do you want to continue ?')"  type="submit">Reject</button></td>
                              </form>
                              </tr>
                              @endfor
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
                          </nav>
                          </ul>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.container-fluid -->

                </div>

@endsection
