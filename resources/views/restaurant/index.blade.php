@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Restuarant List</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Hotels</li>
<li class="breadcrumb-item active">Restuarant List</li>
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
									<th>Location</th>
									<th>Discount</th>
									<th>Contact No</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td>{{ $row->name }}</td>
									<td>{{ $row->location }}</td>
									<td>{{ $row->discount }}</td>
									<td>{{ $row->contact_no }}</td>
									<td>{{ $row->status }}</td>
									<td>
										<a href="" class="btn btn-primary btn-sm">Edit</a>
										<a href="">Delete</a>
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