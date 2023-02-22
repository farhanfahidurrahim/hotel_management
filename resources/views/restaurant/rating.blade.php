@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Restaurant Rating</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Hotels</li>
<li class="breadcrumb-item active">Restaurant Rating</li>
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
									<th>Sl</th>
									<th>Restaurant Name</th>
									<th>Feedback</th>
									<th>Rating</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								@foreach($data as $row)
									<td>{{ $loop->iteration }}</td>
									<td>{{ $row->restaurant->name }}</td>
									<td>{{ $row->feedback }}</td>
									<td>
										@if($row->star==1)<i class="btn btn-secondary">1 Star</i>@endif
										@if($row->star==2)<i class="btn btn-secondary">2 Star</i>@endif
										@if($row->star==3)<i class="btn btn-secondary">3 Star</i>@endif
										@if($row->star==4)<i class="btn btn-secondary">4 Star</i>@endif
										@if($row->star==5)<i class="btn btn-secondary">5 Star</i>@endif
									</td>
									<td>
										<a href="{{ route('restaurant.ratings.edit',$row->id) }}" class="btn btn-primary">Edit</a>
										<a href="{{ route('restaurant.ratings.delete',$row->id) }}" class="btn btn-danger">Delete</a>
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
