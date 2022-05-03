@if(Session::has('success'))
<div class="container-fluid pt-4">
	<div class="row">
		<div class="col-12"><div class="alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</div></div>
	</div>
</div>
@elseif(Session::has('error'))
<div class="container-fluid pt-4">
	<div class="row">
		<div class="col-12"><div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> {{ Session::get('error') }}</div></div>
	</div>
</div>
@endif