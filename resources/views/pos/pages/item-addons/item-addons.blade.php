@extends('pos.pos-tpl')
@section('title') Assign Addons to Items @endsection

@section('content')
<div class="container-fluid pt-3 pb-4">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-9">
			<div class="row">
				<div class="col-12">
					<div class="row justify-content-between">
						<div class="col-auto"><h5 class="mb-0">ID#:{{ $item->id }} | {{ $item->item_name }}</h5></div>
						<div class="col-auto">
							<a href="{{ route('addon.create') }}" class="btn pos-bg-green btn-sm text-white"><i class="fas fa-plus"></i> Create New Addon</a>
						</div>
					</div>
					<hr class="mt-1">
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<form action="{{ route('item-addon.store') }}" method="post">
						@csrf
						<div class="card card-body border-0 shadow">
							<input type="hidden" name="item_id" value="{{ $item->id }}">
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn pos-bg-green text-white btn-md">Update Addons</button> | 
									<a href="{{ route('item.index') }}" class="btn pos-bg-red text-white btn-md">Exit</a>
								</div>
							</div>

							<table class="table hover border-light stripe" id="itemsDataTable">
								<thead>
									<tr>
										<th class="pb-0">Name</th>
										<th class="pb-0">Price</th>
										<th class="pb-0">Add/Remove</th>
									</tr>
								</thead>
								<tbody>
									@foreach($addons as $counter => $addon)
									
										<tr>
											<td>{{ $addon->id }} {{ $addon->addon_name }}</td>
											<td>
												<input type="text" name="addon_price[{{$counter}}]" class="form-control form-control-sm border-secondary text-center" style="width: 55px;" placeholder="$" @foreach($ap as $price) @if($price->addon_id == $addon->id) value="{{ $price->addon_price }}"@endif @endforeach>
											</td>
											<td><input type="checkbox" name="addon_id[{{$counter}}]" value="{{ $addon->id }}" @foreach($ap as $price) @if($price->addon_id == $addon->id) checked @endif @endforeach></td>
										</tr>
								
									@endforeach
								</tbody>
							</table>
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
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('item.create') }}" class="">Add New Item</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('addon.index') }}" class="">My Addons</a></li>
						<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('addon.create') }}" class="">Create New Addon</a></li>
						<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('category.index') }}" class="">My Categories</a></li>
						<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('category.create') }}" class="">Add New Category</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection