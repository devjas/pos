@extends('pos.pos-tpl')
@section('title') My Categories @endsection

@section('content')
<div class="container-fluid pt-3 pb-4">
	<div class="row justify-content-between">
		<div class="col-auto align-self-center"><h4 class="mb-0">My Categories</h4></div>
		<div class="col-auto align-self-center">
			<a href="{{ route('category.create') }}" class="btn pos-bg-green btn-sm text-white"><i class="fas fa-plus"></i> Add New Category</a>
		</div>
	</div>
	<hr class="mt-1">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-8">
			<div class="card rounded-0 border-0 shadow">
				<div class="card-body">
					<ul class="list-group list-group-flush">
						@foreach($categories as $category)
						  <li class="list-group-item ps-0 pe-0 pt-1 pb-1">
						  	<div class="row justify-content-between">
						  		<div class="col-auto">
						  			<a href="{{ route('category.edit', $category->id) }}">{{ $category->pos_category }}</a>
						  		</div>
						  		<div class="col-auto">
						  			<a href="{{ route('category.edit', $category->id) }}"><i class="fas fa-pen color-blue me-3" title="Edit this category"></i></a>
						  			<a href="#"><i class="fas fa-trash color-red" title="Delete this category"></i></a>
						  		</div>
						  	</div>
						  </li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection