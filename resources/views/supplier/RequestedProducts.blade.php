
@extends('theme/main_supplier')

@section('title','Requested Products')

@section('content')

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
                              <th>Supplier Name</th>
                              <th>Product Name</th>
                              <th>Product Image</th>
                              <th>Category Name</th>
                              <th>Product Quantity</th>
                              <th>Request Status</th>
                              <th>Price</th>
                              <th>Update</th>

                            </tr>
                            </thead>

                            <tbody>
                                @for($i=0;$i<count($res);$i++)
                                <tr>
                                <td>{{$res[$i]->supplier_name}}</td>
                                <td>{{$res[$i]->product_name}}</td>
                                <td>{{$res[$i]->product_image}}</td>
                                <td>{{$res[$i]->category_name}}</td>
                                <td>{{$res[$i]->product_quantity}}</td>
                                <td>{{$res[$i]->request_status}}</td>
                                <td>{{$res[$i]->price}}</td>

                                  @if( $res[$i]->request_status =='Rejected' || $res[$i]->request_status == 'Added Successfully' )
                                  <td>
                                  <a href="{{action('RequestController@edit',$res[$i]->request_id)}}"><button disabled>Update</button></a></td>

                                @else
                                <td>
                                <a href="{{action('RequestController@edit',$res[$i]->request_id)}}"><button>Update</button></a></td>

                                @endif
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


@endsection
