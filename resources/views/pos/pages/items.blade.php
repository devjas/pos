@extends('pos.pos-tpl')
@section('title') Items @endsection

@section('content')

<div class="container-fluid pt-3 pb-3">
	<div class="row">
		<div class="col-7">
			<div class="btn-block-container items">
				@foreach($items as $item)
					<a href="/addons-extras" class="pos-btn-block shadow-sm">
						<span class="row h-100"><span class="col-12 align-self-center">{{ $item->item_name }}</span></span>
					</a>
				@endforeach
				
			</div>
		</div>
		<div class="col-5">@include('pos.modules.current-orders')</div>
	</div>
</div>

@endsection