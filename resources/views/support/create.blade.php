@extends('layouts.simple.master')
@section('title', 'Base Inputs')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Help & Support</h3>
@endsection


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Edit Help & Support</h5>
				</div>
				<form action="{{route('support.update')}}" method="POST" class="form theme-form">
					@csrf
					@method('PATCH')
					<div class="card-body">
						<div class="row">
							<div class="col">

                <div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Help & Support</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="title" value="{{$help->title}}">
									</div>
								</div>

                <div class="row mb-0">
                    <label class="col-sm-3 col-form-label">Text</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="5" cols="5">
												{{$help->description}}
											</textarea>
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
</div>
@endsection

@section('script')
@endsection
