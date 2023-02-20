@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Hotel List</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Hotels</li>
<li class="breadcrumb-item active">Hotel List</li>
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
									<th>Name</th>
									<th>Division</th>
									<th>Location</th>
									<th>Price</th>
									<th>Offer Price</th>
									<th>Discount</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td>{{ $row->name }}</td>
									<td>{{ $row->division->name }}</td>
									<td>{{ $row->location }}</td>
									<td>{{ $row->price }}</td>
									<td>{{ $row->offer_price }}</td>
									<td>{{ $row->discount }}</td>
									<td> @if($row->status==1)
											<i class="btn btn-success">Active</i>
										@endif
										@if($row->status==0)
											<i class="btn btn-danger">In-Active</i>
										@endif
									</td>
									<td>
										<a href="{{ route('hotels.edit',$row->id) }}" class="btn btn-primary btn-sm">Edit</a>
										<a href="{{ route('hotels.delete',$row->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
