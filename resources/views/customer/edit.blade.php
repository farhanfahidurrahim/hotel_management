@extends('layouts.simple.master')
@section('title', 'Base Inputs')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Create Customer</h3>
@endsection


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Create a New Customer</h5>
				</div>
				<form class="form theme-form" action="{{route('customer.update',$customer->id)}}" method="POST">
					@csrf
					@method('PATCH')
					<div class="card-body">
						<div class="row">
							<div class="col">

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Cusomer Name</label>
									<div class="col-sm-9">
										<input class="form-control" name="name" type="text" value="{{old('name',$customer->name)}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Customer Email</label>
									<div class="col-sm-9">
										<input class="form-control" name="email" type="text" value="{{old('email',$customer->email)}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Customer Phone</label>
									<div class="col-sm-9">
										<input class="form-control" name="phone" type="text" value="{{old('phone',$customer->phone)}}">
									</div>
								</div>

                <div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Status</label>
									<div class="col-sm-9">
										<select name="status" class="custom-select form-select">
											<option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>Active</option>
											<option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>Inactive</option>
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
