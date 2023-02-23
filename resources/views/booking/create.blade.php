@extends('layouts.simple.master')
@section('title', 'Base Inputs')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Create Booking</h3>
@endsection


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Book A Hotel Room</h5>
					<a href="{{ route('booking.index') }}" class="" style="float: right;">All Booking List</a>
				</div>
				<form class="form theme-form" method="POST" action="{{ route('booking.store') }}">
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="col">

                				{{-- <div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Select User</label>
									<div class="col-sm-9">
										<select class="custom-select form-select">
											<option selected="">Open this select menu</option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
										</select>
									</div>
								</div> --}}

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Customer Name</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="customer_name" placeholder="Customer Name">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Customer Phone</label>
									<div class="col-sm-9">
										<input class="form-control" type="number" name="customer_phone" placeholder="Customer Phone">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Select Hotel & Room</label>
									<div class="col-sm-9">
										<select class="custom-select form-select" name="room_id">
											<option selected="" disabled>Open this select hotel</option>
											@foreach($hotel as $row)
												@php
													$hotelroom=DB::table('hotelrooms')->where('hotel_id',$row->id)->get();
												@endphp
												<option disabled style="color: red">{{ $row->name }}</option>
												@foreach($hotelroom as $row)
													<option value="{{$row->id}}">---{{ $row->title }}</option>
												@endforeach
											@endforeach
										</select>
									</div>
								</div>
                				
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Number of Rooms</label>
									<div class="col-sm-9">
										<input class="form-control" type="Number" name="numberof_room" placeholder="Number of Rooms">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Check In</label>
									<div class="col-sm-9">
										<input class="form-control digits" name="check_in" id="example-datetime-local-input" type="date">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Check Out</label>
									<div class="col-sm-9">
										<input class="form-control digits" name="check_out" id="example-datetime-local-input" type="date">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Distance</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="distance" placeholder="Distance">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Original Price</label>
									<div class="col-sm-9">
										<input class="form-control" type="Number" name="original_price" placeholder="Original Price" step="0.01">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Discount</label>
									<div class="col-sm-9">
										<input class="form-control" type="Number" name="discount" placeholder="Discount Price" step="0.01">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Final Price</label>
									<div class="col-sm-9">
										<input class="form-control" type="Number" name="final_price" placeholder="Final Price" step="0.01">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Select Status</label>
									<div class="col-sm-9">
										<select name="status" class="custom-select form-select">
											<option selected="" disabled>Open this select menu</option>
											<option value="0">Pending</option>
											<option value="1">Booked</option>
											<option value="2">Rejected</option>
										</select>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="text-center">
						<button class="mb-5 btn btn-primary text-center" type="submit">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
@endsection
