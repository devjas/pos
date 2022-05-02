@extends('pos.pos-tpl')
@section('title') Category @endsection

@section('content')

<div class="container-fluid pt-3 pb-3">
	<div class="row">
		<div class="col-7">
			@if(count($categories) < 1)
				<p><a href="{{ route('category.create') }}">Create Some Categories</a></p>
			@else 
			<div class="btn-block-container categories">
				@foreach($categories as $category)
					<a href="/items" class="pos-btn-block shadow-sm">
						<span class="row h-100"><span class="col-12 align-self-center">{{ $category->pos_category }}</span></span>
					</a>
				@endforeach
			</div>
			@endif
		</div>
		<div class="col-5">@include('pos.modules.current-orders')</div>
	</div>
</div>

@endsection