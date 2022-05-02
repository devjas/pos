@extends('pos.pos-tpl')
@section('title') Create New Category @endsection

@section('content')
<div class="container-fluid pt-4 pb-4">
	<div class="row justify-content-between">
		<div class="col-auto"><h4 class="mb-0">Add New Category</h4></div>
		<div class="col-auto align-self-center">
			<a href="{{ route('category.index') }}" class="btn pos-bg-red btn-sm text-white"><i class="fas fa-list"></i> My Categories</a>
		</div>
	</div>
	<hr class="mt-1">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-8">
			<div class="card card-body rounded-0 border-0 shadow p-4">
				<div class="row">
					<div class="col-12 col-md-8 col-lg-6">
						<form action="{{ route('category.store') }}" method="post">
							@csrf
							<div class="row mb-3">
								<div class="col-12">
									<label for="pos_category">CATEGORY NAME</label>
									<input type="text" name="pos_category" class="form-control border-secondary" value="{{ old('pos_category') }}">
									@if($errors->has('pos_category'))
										<span class="color-red fw-bold">{{ $errors->first('pos_category') }}</span>
									@endif	
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn btn-lg pos-bg-green text-white">Add Category</button>
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection