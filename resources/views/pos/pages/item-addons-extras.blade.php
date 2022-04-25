@extends('pos.pos-tpl')
@section('title') Addons and Extras @endsection

@section('content')
<div class="container-fluid pt-3 pb-3">
	<div class="row">
		<div class="col-7">
			<div class="row">
				<div class="col-12">
					<p class="mb-1 fw-bold text-secondary">SIDES / TOPPINGS</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="btn-block-container addons-extras">
						<label class="pos-btn-block shadow-sm">
							<input type="checkbox" value="35">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Tomato') }}</p>
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
						<label class="pos-btn-block shadow-sm hello">
							<input type="checkbox" value="589">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Lettuce') }}</p>
									<span class="mb-0 fw-normal add-opt"></span>
								</span>
								<div>
									<ul class="addon-option shadow-sm">
										<li><button type="button" value="add">ADD</button></li>
										<li><button type="button" value="extra">EXTRA</button></li>
										<li><button type="button" value="side">SIDE</button></li>
										<li><button type="button" value="0">NO</button></li>
									</ul>
								</div>
							</span>
						</label>
						<label class="pos-btn-block shadow-sm">
							<input type="checkbox" value="456">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Cucumber') }}</p>
									<span class="mb-0 fw-normal add-opt"><i></i></span>
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
						<label class="pos-btn-block shadow-sm">
							<input type="checkbox" value="4197">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Mayo') }}</p>
									<span class="mb-0 fw-normal add-opt"><i></i></span>
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
					</div>	
				</div>
			</div>
			<!-- Side Extras -->
			<div class="row mt-4">
				<div class="col-12">
					<p class="mb-1 fw-bold text-secondary">SIDE EXTRAS</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="btn-block-container addons-extras">
						<label class="pos-btn-block shadow-sm">
							<input type="checkbox" value="1">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('French Fries') }}</p>
									<p class="mb-0 fw-normal">+ $1.99</p>
									<p class="mb-0 fw-normal">- Add</p>
								</span>
							</span>
						</label>
						<label class="pos-btn-block shadow-sm">
							<input type="checkbox" value="1">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Onion Rings') }}</p>
									<p class="mb-0 fw-normal">+ $1.88</p>
								</span>
							</span>
						</label>
						<label class="pos-btn-block shadow-sm">
							<input type="checkbox" value="1">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Curly Fries') }}</p>
									<p class="mb-0 fw-normal">+ 3.55</p>
								</span>
							</span>
						</label>
						<label class="pos-btn-block shadow-sm">
							<input type="checkbox" value="1">
							<span class="row h-100 pos-btn-checkbox">
								<span class="col-12 align-self-center">
									<p class="mb-0">{{ __('Wild Rice') }}</p>
									<p class="mb-0 fw-normal">+ $1.88</p>
								</span>
							</span>
						</label>
					</div>	
				</div>
			</div>
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