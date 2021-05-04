<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-12 col-md-12 col-sm-12 mb-3">
			<h5 class="mb-2 mt-2">Invoice Transaction</h5>
			<table width="100%">
				<thead>
					<tr>
						<th>Code</th> <td>:</td> <td>{{$trx->code}}</td>			
						<th>Name</th> <td>:</td> <td>{{$trx->user->fullname}}</td>			
					</tr>
					<tr>
						<th>Grand Total</th> <td>:</td> <td>{{$trx->grand_total}}</td>	
						<th>Status</th> <td>:</td> <td>{{$trx->status}}</td>			
					</tr>
					<tr>
						<th>Date</th> <td>:</td> <td>{{$trx->created_at}}</td>				
					</tr>		
				</thead>
			</table>
		</div>	
		<div class="col-lg-12 col-md-12 col-sm-12 mb-3">
			<h5 class="mb-2 mb-2">Detail Item</h5>
			<table width="100%" class="table table-stripped">
				<thead>
					<tr>
						<th>Code</th>
						<th>Vendor</th>
						<th>Service</th>
						<th>Quantity</th>
						<th>Price</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($detail as $row)
						<tr>
							<td>{{$trx->code}}</td>
							<td>{{$row->vendor_name}}</td>
							<td>{{$row->service_name}}</td>
							<td>{{$row->quantity}}</td>
							<td>{{$row->amount}}</td>
							<td>{{ intval( $row->quantity ) * intval($row->amount) }}</td>
						</tr>
					@endforeach
						<tr>
							<td></td>
							<td></td>
							<th>Total Quantity</th>
							<td>{{$row->quantity}}</td>
							<th>Total Price</th>
							<td>{{ intval( $row->quantity ) * intval($row->amount) }}</td>
						</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>