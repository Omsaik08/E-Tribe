@extends('theme/main')

@section('title','Display Order Details')

@section('content')

<div class="container p-5" style="border:1px solid #7f0794;">

	<table class="table table-bordered">
		
		<thead >
			<tr>
				<th>Customer ID</th>
				<th>Product ID</th>
				<th>Quantity</th>
				<th>Order Date</th>
				<th>Total Price</th>
				<th>Shippment Date</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			<tr>
				<td >1</td>
				<td>1</td>
				<td>10</td>
				<td>2 jan 2020</td>
				<td>10000</td>
				<td>5 jan 2020</td>
				<td>
					<button class="btn btn-primary btn-user btn-block ">UPDATE</button>
					<button class="btn btn-primary btn-user btn-block ">DELETE</button>
				</td>
			</tr>
		</tbody>
	
	</table>

</div>    
<br><br>

@endsection