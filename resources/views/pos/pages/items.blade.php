@extends('pos.pos-tpl')
@section('title') Items @endsection

@section('content')
<div class="container-fluid pt-3 pb-3">
	<div class="row">
		<div class="col-7">
			<div class="btn-block-container items">
				@foreach($items as $item)
					<form action="{{ route('order.store') }}" id="posBtns" method="post">
						@csrf
						<input type="hidden" name="item_id" value="{{ $item->id }}">
						<input type="hidden" name="item_price" value="{{ $item->item_price }}">
						<input type="hidden" name="item_name" value="{{ $item->item_name }}">
						<input type="hidden" name="category_id" value="{{ request()->category_id }}">
						<button type="submit" class="btn pos-btn-block shadow-sm">
							<span class="row h-100"><span class="col-12 align-self-center">{{ $item->item_name }}</span></span>
						</button>
					</form>
					<!-- <a href="{{ route('addons.extras', $item->id) }}" class="pos-btn-block shadow-sm">
						<span class="row h-100"><span class="col-12 align-self-center">{{ $item->item_name }}</span></span>
					</a> -->
				@endforeach
			</div>
		</div>
		<div class="col-5">@include('pos.modules.current-orders')</div>
	</div>
</div>

@endsection