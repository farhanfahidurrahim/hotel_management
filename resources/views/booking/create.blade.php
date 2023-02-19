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
				</div>
				<form class="form theme-form">
					<div class="card-body">
						<div class="row">
							<div class="col">

                <div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Select User</label>
									<div class="col-sm-9">
										<select class="custom-select form-select">
											<option selected="">Open this select menu</option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
										</select>
									</div>
								</div>

                <div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Select Hotel</label>
									<div class="col-sm-9">
										<select class="custom-select form-select">
											<option selected="">Open this select menu</option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
										</select>
									</div>
								</div>
                <div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Select Hotel Room</label>
									<div class="col-sm-9">
										<select class="custom-select form-select">
											<option selected="">Open this select menu</option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Number of Rooms</label>
									<div class="col-sm-9">
										<input class="form-control" type="Number" placeholder="Number of Rooms">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Check In</label>
									<div class="col-sm-9">
										<input class="form-control digits" id="example-datetime-local-input" type="datetime-local" value="2018-01-19T18:45:00">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Check Out</label>
									<div class="col-sm-9">
										<input class="form-control digits" id="example-datetime-local-input" type="datetime-local" value="2018-01-19T18:45:00">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Price</label>
									<div class="col-sm-9">
										<input class="form-control" type="Number" placeholder="Price"
                    step="0.01"
                    >
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Offer Price</label>
									<div class="col-sm-9">
										<input class="form-control" type="Number" placeholder="Offer Price"
                    step="0.01"
                    >
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Discount ( % )</label>
									<div class="col-sm-9">
										<input class="form-control" type="Number" placeholder="Discount"
                    step="0.01"
                    >
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center">
						<button class="mb-5 btn btn-primary text-center" type="button">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
@endsection
