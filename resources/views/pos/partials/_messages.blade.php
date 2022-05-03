@if(Session::has('success'))
<div class="container-fluid pt-4">
	<div class="row">
		<div class="col-12">
			<div class="alert alert-success">
				<i class="far fa-smile fs-2 align-middle me-2"></i> <span class="align-middle pt-1 d-inline-block">{{ Session::get('success') }}</span>
			</div>
		</div>
	</div>
</div>
@elseif(Session::has('error'))
<div class="container-fluid pt-4">
	<div class="row">
		<div class="col-12">
			<div class="alert alert-danger">
				<i class="far fa-frown fs-2 align-middle me-2"></i> <span class="align-middle pt-1 d-inline-block">{{ Session::get('error') }}</span>
			</div>
		</div>
	</div>
</div>
@elseif(Session::has('warning'))
<div class="container-fluid pt-4">
	<div class="row">
		<div class="col-12">
			<div class="alert alert-warning">
				<i class="far fa-meh fs-2 align-middle me-2"></i> <span class="align-middle pt-1 d-inline-block">{{ Session::get('warning') }}</span>
			</div>
		</div>
	</div>
</div>
@endif