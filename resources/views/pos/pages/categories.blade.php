@extends('pos.pos-tpl')
@section('title') Category @endsection

@section('content')

<div class="container-fluid pt-3 pb-3">
	<div class="row">
		<div class="col-7">
			<div class="btn-block-container categories">
				<a href="/items" class="pos-btn-block shadow-sm">
					<span class="row h-100"><span class="col-12 align-self-center">{{ __('APPETIZERS') }}</span></span>
				</a>
				<a href="/items" class="pos-btn-block shadow-sm">
					<span class="row h-100"><span class="col-12 align-self-center">{{ __('SPECIALS') }}</span></span>
				</a>
				<a href="/items" class="pos-btn-block shadow-sm">
					<span class="row h-100"><span class="col-12 align-self-center">{{ __('WINGS') }}</span></span>
				</a>
				<a href="/items" class="pos-btn-block shadow-sm">
					<span class="row h-100"><span class="col-12 align-self-center">{{ __('ENTREES') }}</span></span>
				</a>
			</div>
		</div>
		<div class="col-5">@include('pos.modules.current-orders')</div>
	</div>
</div>

@endsection