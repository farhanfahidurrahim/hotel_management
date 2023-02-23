@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Hotel Booked</h3>
@endsection

@section('breadcrumb-items')
<a href="{{ route('booking.create') }}" class="btn btn-danger">Hotel Booking Create</a>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">

		<!-- Default ordering (sorting) Starts-->
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display dataTable" id="basic-3">
							<thead>
								<tr>
									<th>Customer Name</th>
									<th>Customer Phone</th>
									<th>Hotel Name</th>
									<th>Room Title</th>
									<th>Check-in</th>
									<th>Check-out</th>
									<th>Distance</th>
									<th>Number of Room</th>
									<th>Original Price</th>
									<th>Discount</th>
									<th>Final Price</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td>{{ $row->customer_name }}</td>
									<td>{{ $row->customer_phone }}</td>
									<td>{{ $row->hotel->name }}</td>
									<td>{{ $row->hotelroom->title }}</td>
									<td>{{ $row->check_in }}</td>
									<td>{{ $row->check_out }}</td>
									<td>{{ $row->distance }}</td>
									<td>{{ $row->numberof_room }}</td>
									<td>{{ $row->original_price }}</td>
									<td>{{ $row->discount }}</td>
									<td>{{ $row->final_price }}</td>
									<td>
										@if( $row->status==0 )<i class="btn btn-warning">Pending</i>@endif
										@if( $row->status==1 )<i class="btn btn-success">Booked</i>@endif
										@if( $row->status==2 )<i class="btn btn-danger">Rejected</i>@endif
									</td>
									<td class="d-flex">
										<a class="btn btn-primary active" href="{{route('booking.edit',$row->id)}}">Edit</a>
										<form class="px-3" onclick="return confirm('Are you sure you want to delete this contact?')" 	 method="POST" action="{{route('booking.delete',$row->id)}}">
											@csrf
											@method('DELETE')
											<button class="btn btn-secondary active">Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Default ordering (sorting) Ends-->

	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
