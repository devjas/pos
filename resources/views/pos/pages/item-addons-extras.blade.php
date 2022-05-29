@extends('pos.pos-tpl')
@section('title') Addons and Extras @endsection

@section('content')
<div class="container-fluid pt-2 pb-3">
	<div class="row">
		<div class="col-7">
			<div class="row ">
				<div class="col-12">
					<h4 class="mb-0">{{ $item->item_name }} | 
					<small>${{ number_format($item->item_price, 2) }}</small><small class="fw-normal">/
					@if($item->item_per == 1) Each @elseif($item->item_per == 2) LB @elseif($item->item_per == 3) Dozen @elseif($item->item_per == 4) Half Dozen @endif</small></h4>
					<p class="mb-0 text-secondary">{{ $item->item_description }}</p>
				</div>
			</div>
			<hr class="mt-0">	

			@if($null_price_count > 0)
			<div class="row">
				<div class="col-12">
					<p class="fw-bold text-secondary mb-1">SIDES / TOPPINGS</p>
				</div>
			</div>
			
			<div class="row mb-4">
				<div class="col-12">
					<div class="btn-block-container addons-extras">
						@foreach($item->addons as $addon)
							@if($addon->pivot->addon_price == null)
								<label class="pos-btn-block shadow-sm">
									<input type="checkbox" value="35">
									<span class="row h-100 pos-btn-checkbox">
										<span class="col-12 align-self-center">
											<p class="mb-0">{{ __($addon->addon_name) }}</p>
											<span class="mb-0 fw-normal add-opt"></span>
										</span>
									</span>
									<div>
										<ul class="addon-option shadow-sm">
											<li><button type="button" value="add">ADD</button></li>
											<li><button type="button" value="extra">EXTRA</button></li>
											<li><button type="button" value="side">SIDE</button></li>
											<li><button type="button" value="0">NO</button></li>
										</ul>
									</div>
								</label>
							@endif
						@endforeach
					</div>	
				</div>
			</div>
			@endif

			<!-- Side Extras -->

			@if($with_price_count > 0)
			<div class="row">
				<div class="col-12">
					<p class="mb-1 fw-bold text-secondary">SIDE EXTRAS</p>
				</div>
			</div>
 
			<div class="row">
				<div class="col-12">
					<div class="btn-block-container addons-extras">
						@foreach($item->addons as $addon)
							@if($addon->pivot->addon_price !== null)
								<label class="pos-btn-block shadow-sm">
									<input type="checkbox" value="1">
									<span class="row h-100 pos-btn-checkbox">
										<span class="col-12 align-self-center">
											<p class="mb-0">{{ __($addon->addon_name) }}</p>
											<p class="mb-0 fw-normal">+ ${{ $addon->pivot->addon_price }}</p>
										</span>
									</span>
								</label>
							@endif
						@endforeach
					</div>	
				</div>
			</div>
			@endif
			<!-- Welness Option -->
			<div class="row mt-4">
				<div class="col-12">
					<p class="mb-1 fw-bold text-secondary">WELLNESS OPTION</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="btn-block-container addons-extras">
						<label class="pos-btn-block shadow-sm">
							<input type="radio" name="wellness_option" value="1">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Med Rare') }}</p>
								</span>
							</span>
						</label>
						<label class="pos-btn-block shadow-sm">
							<input type="radio" name="wellness_option" value="1">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Medium') }}</p>
								</span>
							</span>
						</label>
						<label class="pos-btn-block shadow-sm">
							<input type="radio" name="wellness_option" value="1">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Med Well') }}</p>
								</span>
							</span>
						</label>
						<label class="pos-btn-block shadow-sm">
							<input type="radio" name="wellness_option" value="1">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Well') }}</p>
								</span>
							</span>
						</label>
					</div>	
				</div>
			</div>
		</div>
		<div class="col-5">@include('pos.modules.current-orders')</div>
	</div>
</div>
@endsection