@extends('pos.pos-tpl')
@section('title') Add New Item @endsection
@section('csslibrary')
<link rel="stylesheet" href="{{ asset('/pos/css/multi-select/multi_select.css') }}">
@endsection
@section('content')
<div class="container-fluid pt-3 pb-4">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-9">
			<div class="row justify-content-between">
				<div class="col-auto"><h4 class="mb-0">Add New Item</h4></div>
				<div class="col-auto align-self-center">
					<a href="{{ route('item.index') }}" class="btn pos-bg-dark btn-sm text-white">My Items</a>
				</div>
			</div>
			<hr class="mt-1">
			<div class="row">
				<div class="col-12">
					<form action="{{ route('item.store') }}" method="post">
						@csrf
						<div class="card rounded-0 border-0 shadow p-3">
							<div class="card-header bg-white">
								<div class="row">
									<div class="col-12">
										<button type="submit" class="btn btn-md pos-bg-green text-white">Add Item</button> | 
										<a href="{{ route('item.index') }}" class="btn btn-md pos-bg-red text-white">Exit</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 col-md-10 col-lg-8 col-xl-7">

										<div class="row mb-2 test">
											<div class="col-12">
												<label for="item_category">CATEGORY</label>
												<select name="item_category[]" multiple class="border-secondary" id="selectOption" data-multi="multi-select">
													@foreach($categores as $category)
														<option value="{{ $category->id }}">{{ $category->pos_category }}</option>
													@endforeach
												</select>
												@if($errors->has('item_category'))
													<span class="color-red fw-bold">{{ $errors->first('item_category') }}</span>
												@endif
											</div>
										</div>

										<div class="row mb-2">
											<div class="col-12">
												<label for="item_name">ITEM NAME</label>
												<input type="text" name="item_name" class="form-control border-secondary" value="{{ old('item_name') }}">
												@if($errors->has('item_name'))
													<span class="color-red fw-bold">{{ $errors->first('item_name') }}</span>
												@endif	
											</div>
										</div>

										<div class="row mb-2">
											<div class="col-12">
												<label for="item_description">DESCRIPTION</label>
												<textarea type="text" name="item_description" class="form-control border-secondary">
												{{ old('item_description') }}</textarea>
												@if($errors->has('item_description'))
													<span class="color-red fw-bold">{{ $errors->first('item_description') }}</span>
												@endif	
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-12 col-sm-5 mb-2 mb-lg-0">
												<label for="item_price">ITEM PRICE</label>
												<input type="text" name="item_price" class="form-control border-secondary" value="{{ old('item_price') }}">
												@if($errors->has('item_price'))
													<span class="color-red fw-bold">{{ $errors->first('item_price') }}</span>
												@endif	
											</div>
											<div class="col-12 col-sm-3 mb-2 mb-lg-0">
												<label for="item_per">ITEM PER</label>
												<select name="item_per" class="form-select border-secondary">
													<option value="0">Choose</option>
													<option value="1" {{ old('item_per') == 1  ? "selected" : null }}>Each</option>
													<option value="2" {{ old('item_per') == 2 ? "selected" : null }}>LB</option>
													<option value="3" {{ old('item_per') == 3 ? "selected" : null }}>Dozen</option>
													<option value="4" {{ old('item_per') == 4 ? "selected" : null }}>Half Dozen</option>
												</select>
												@if($errors->has('item_per'))
													<span class="color-red fw-bold">{{ $errors->first('item_per') }}</span>
												@endif	
											</div>
											<div class="col-12 col-sm-4">
												<label for="item_tax">ITEM TAX</label>
												<select name="item_tax" class="form-select border-secondary">
													<option value="0">Choose Tax</option>
													<option value="0.0625" {{ old('item_tax') == 0.0625 ? "selected" : "" }}>CT Tax</option>
													<option value="0.0789" {{ old('item_tax') == 0.0789 ? "selected" : "" }}>NY Tax</option>
												</select>
												@if($errors->has('item_tax'))
													<span class="color-red fw-bold">{{ $errors->first('item_tax') }}</span>
												@endif	
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-12"><p class="mb-0">Click if this is a special Item?</p></div>
											<div class="col-12">
												<div class="check-btn">
													<label>
														<input type="checkbox" name="special_item" value="1">
														<span class="check-btn-span"><span>Special Item</span></span>
													</label>
												</div>
												@if($errors->has('special_item'))
													<span class="color-red fw-bold">{{ $errors->first('special_item') }}</span>
												@endif
											</div>
										</div>

										<div class="row">
											<div class="col-12"><p class="mb-1">ITEM VISIBILITY</p></div>
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
						<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('item.index') }}" class="">My Items</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('category.index') }}" class="">My Categories</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('category.create') }}" class="">Add New Category</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('jslibrary')
<script type="text/javascript" src="{{ asset('/pos/js/multi-select/multi_select.js') }}"></script>
@endsection