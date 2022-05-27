@extends('pos.pos-tpl')
@section('title') Create New Category @endsection

@section('content')
<div class="container-fluid pt-3 pb-4">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-9">
			<div class="row justify-content-between">
				<div class="col-auto"><h4 class="mb-0">Add New Category</h4></div>
				<div class="col-auto align-self-center">
					<a href="{{ route('category.index') }}" class="btn pos-bg-dark btn-sm text-white">My Categories</a>
				</div>
			</div>
			<hr class="mt-1">
			<div class="row">
				<div class="col-12">
					<form action="{{ route('category.store') }}" method="post">
						<div class="card rounded-0 border-0 shadow p-3">
							<div class="card-header bg-white">
								<div class="row">
									<div class="col-12">
										<button type="submit" class="btn btn-md pos-bg-green text-white">Add Category</button> | 
										<a href="{{ route('category.index') }}" class="btn btn-md pos-bg-red text-white">Exit</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								@csrf
								<div class="row">
									<div class="col-12 col-md-8 col-lg-7">
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
											<div class="col-12"><p class="mb-1">CATEGORY VISIBILITY</p></div>
											<div class="col-12">
												<div class="check-btn">
													<label>
														<input type="radio" name="is_visible" value="1" {{ old('is_visible') == 1 ? "checked" : "" }}>
														<span class="check-btn-span"><span>Visible</span></span>
													</label>
													<label>
														<input type="radio" name="is_visible" value="2" {{ old('is_visible') == 2 ? "checked" : "" }}>
														<span class="check-btn-span unpublish"><span>Invisible</span></span>
													</label>
												</div>
												@if($errors->has('is_visible'))
													<span class="color-red fw-bold">{{ $errors->first('is_visible') }}</span>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-8 col-md-5 col-lg-3 mt-3 mt-lg-0">
			<div class="card rounded-0 border-0 bg-light">
				<div class="card-body">
					<p class="fw-bold mb-0">Quick Links:</p>
					<hr class="mb-2 mt-1 pos-bg-light">
					<ul class="list-group list-group-flush">
					  <li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('category.index') }}" class="">My Categories</a></li>
					  <li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('item.create') }}" class="">Add New Item</a></li>
					  <li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('item.index') }}" class="">My Items</a></li>
					  <li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('addon.create') }}" class="">Create New Addon</a></li>
					  <li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('addon.index') }}" class="">My Addons</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection