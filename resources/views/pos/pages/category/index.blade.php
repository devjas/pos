@extends('pos.pos-tpl')
@section('title') My Categories @endsection
@section('csslibrary')
<link rel="stylesheet" type="text/css" href="{{ asset('pos/css/datatable/datatables.min.css') }}">
@endsection
@section('content')
<div class="container-fluid pt-3 pb-4">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-9">
			<div class="row">
				<div class="col-12">
					<div class="row justify-content-between">
						<div class="col-auto align-self-center"><h4 class="mb-0">My Categories</h4></div>
							<div class="col-auto align-self-center">
								<a href="{{ route('category.create') }}" class="btn pos-bg-green btn-sm text-white"><i class="fas fa-plus"></i> Add New Category</a>
						</div>
					</div>
					<hr class="mt-1">
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card rounded-0 border-0 shadow">
						<div class="card-body table-responsive">
							<table class="table hover border-light stripe" id="itemsDataTable">
								<thead>
									<tr>
										<th class="pb-0">Name</th>
										<th class="pb-0 text-end">Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $category)
										<tr>
											<td><a href="{{ route('category.edit', $category->id) }}">{{ $category->pos_category }}</a></td>
											<td class="text-end">
												<span class="badge fw-normal pos-bg-{{ $category->is_visible == 1 ? "green" : "red" }}">
									  				{{ $category->is_visible == 1 ? "Visible" : "Invisible" }}
									  			</span>
									  			<a href="{{ route('category.edit', $category->id) }}"><i class="fas fa-pen color-blue ms-3 me-3" title="Edit this category"></i></a>
									  			<a href="#"><i class="fas fa-trash color-red" title="Delete this category"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-8 col-md-5 col-lg-3 mt-3 mt-lg-0">
			<div class="card rounded-0 border-0 bg-light">
				<div class="card-body">
					<p class="fw-bold mb-0">Quick Links:</p>
					<hr class="mb-2 mt-1 pos-bg-light">
					<ul class="list-group list-group-flush">
						<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('category.create') }}" class="">Add New Category</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('item.index') }}" class="">My Items</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('item.create') }}" class="">Add New Item</a></li>
					  	<li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('addon.create') }}" class="">Create New Addon</a></li>
					  <li class="list-group-item ps-0 pe-0 border-bottom-0 pb-0 pt-0 bg-transparent"><a href="{{ route('addon.index') }}" class="">My Addons</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('jslibrary')
<script type="text/javascript" src="{{ asset('pos/js/datatable/datatables.min.js') }}"></script>
<script>
	$(document).ready(function() {
		$("#itemsDataTable").DataTable({

		});
	});
</script>
@endsection