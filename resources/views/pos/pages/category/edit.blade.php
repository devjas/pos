@extends('pos.pos-tpl')
@section('title') Edit Category @endsection

@section('content')
<div class="container-fluid pt-3 pb-4">
	<div class="row">
		<div class="col-auto"><h4 class="mb-0">Edit Category</h4></div>
		<div class="col-auto align-self-center">
			<a href="{{ route('category.index') }}" class="btn pos-bg-dark btn-sm text-white">My Categories</a>
		</div>
	</div>
	<hr class="mt-1">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-8">
			<div class="card card-body rounded-0 border-0 shadow p-4">
				<div class="row">
					<div class="col-12 col-md-8 col-lg-6">
						<form action="{{ route('category.update', $category->id) }}" method="post">
							@csrf
							@method('PUT')
							<div class="row mb-3">
								<div class="col-12">
									<label for="pos_category">CATEGORY NAME</label>
									<input type="text" name="pos_category" class="form-control border-secondary" value="{{ $category->pos_category }}">
									@if($errors->has('pos_category'))
										<span class="color-red fw-bold">{{ $errors->first('pos_category') }}</span>
									@endif	
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-12">
									<div class="check-btn">
										<label>
											<input type="radio" name="is_visible" value="1" {{ $category->is_visible == 1 ? 'checked' : '' }}>
											<span class="check-btn-span"><span>Visible</span></span>
										</label>
										<label>
											<input type="radio" name="is_visible" value="0" {{ $category->is_visible == 0 ? 'checked' : '' }}>
											<span class="check-btn-span unpublish"><span>Invisible</span></span>
										</label>
									</div>
									@if($errors->has('is_visible'))
										<span class="color-red fw-bold">{{ $errors->first('is_visible') }}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn btn-md pos-bg-green text-white">Update Category</button>
									<a href="{{ route('category.index') }}" class="btn btn-md pos-bg-red text-white">Exit</a>
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