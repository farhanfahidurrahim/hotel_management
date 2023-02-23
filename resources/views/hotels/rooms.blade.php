@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Hotel Room Offers</h3>
@endsection

@section('breadcrumb-items')
<a href="{{ route('hotels.rooms.create') }}" class="btn btn-primary">Create Room</a>
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
									<th>Hotel Name</th>
									<th>Title</th>
									<th>Price</th>
									<th>Discount(%)</th>
									<th>Discount Price</th>
									<th>Offer Start Date</th>
									<th>Offer End Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td>{{ $row->hotel->name }}</td>
									<td>{{ $row->title }}</td>
									<td>{{ $row->price }}</td>
									<td>{{ $row->discount }}%</td>
									<td>{{ $row->discount_price }}</td>
									<td>{{ $row->offer_start_date }}</td>
									<td>{{ $row->offer_end_date }}</td>
									<td class="d-flex">
										<a class="btn btn-primary active" href="{{route('hotels.rooms.edit',$row->id)}}">Edit</a>
										<form class="px-3" onclick="return confirm('Are you sure you want to delete this contact?')" 	 method="POST" action="{{route('hotels.rooms.delete',$row->id)}}">
											@csrf
											@method('DELETE')
											<button class="btn btn-secondary active">Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>	
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
