@extends('pos.pos-tpl')
@section('title') Items @endsection

@section('content')

<div class="container-fluid pt-3 pb-3">
	<div class="row">
		<div class="col-7">
			<div class="btn-block-container items">
				<a href="/addons-extras" class="pos-btn-block shadow-sm">
					<span class="row h-100"><span class="col-12 align-self-center">{{ __('CHICKEN QUESADILLA') }}</span></span>
				</a>
				<a href="/addons-extras" class="pos-btn-block shadow-sm">
					<span class="row h-100"><span class="col-12 align-self-center">{{ __('CLAMS CASINO') }}</span></span>
				</a>
				<a href="/addons-extras" class="pos-btn-block shadow-sm">
					<span class="row h-100"><span class="col-12 align-self-center">{{ __('GARLIC BREAD SUPREME') }}</span></span>
				</a>
				<a href="/addons-extras" class="pos-btn-block shadow-sm">
					<span class="row h-100"><span class="col-12 align-self-center">{{ __('FRIED CALAMARY') }}</span></span>
				</a>
			</div>
		</div>
		<div class="col-5">@include('pos.modules.current-orders')</div>
	</div>
</div>

@endsection