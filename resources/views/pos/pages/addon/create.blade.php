@extends('pos.pos-tpl')
@section('title') Create New Addon @endsection

@section('content')
<div class="container-fluid pt-3 pb-4">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-9">
			<div class="row justify-content-between">
				<div class="col-auto"><h4 class="mb-0">Create New Addon</h4></div>
				<div class="col-auto align-self-center">
					<a href="{{ route('addon.index') }}" class="btn pos-bg-dark btn-sm text-white">My Addons</a>
				</div>
			</div>
			<hr class="mt-1">
			<div class="row">
				<div class="col-12">
					<form action="{{ route('addon.store') }}" method="post">
						<div class="card rounded-0 border-0 shadow p-3">
							<div class="card-header bg-white">
								<div class="row">
									<div class="col-12">
										<button type="submit" class="btn btn-md pos-bg-green text-white">Create Addon</button> | 
										<a href="{{ route('addon.index') }}" class="btn btn-md pos-bg-red text-white">Exit</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								@csrf
								<div class="row">
									<div class="col-12 col-md-8 col-lg-7">
										<div class="row mb-3">
											<div class="col-12">
												<label for="addon_name">ADDON NAME</label>
												<input type="text" name="addon_name" class="form-control border-secondary" value="{{ old('addon_name') }}">
												@if($errors->has('addon_name'))
													<span class="color-red fw-bold">{{ $errors->first('addon_name') }}</span>
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
						<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('addon.index') }}" class="">My Addons</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('category.index') }}" class="">My Categories</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('category.create') }}" class="">Add New Cateogry</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('item.create') }}" class="">Add New Item</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('item.index') }}" class="">My Items</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection