@extends('layouts.app')

@section('content')
<div class="container-fluid" style="text-align: center">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h1>Application Form</h1>
			<div class="row">
				<div class="col-md-12">
					<a class="btn btn-primary" href="/cru_buttons?form_name=matrimony" style="width:100%; height: 20vh; font-size: 20px; line-height: 18vh; vertical-align: middle;">Matrimony</a>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<a class="btn btn-primary" href="/cru_buttons?form_name=house_listing" style="width:100%; height: 20vh; font-size: 20px; line-height: 18vh; vertical-align: middle;">House Listing</a>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<a class="btn btn-primary" href="/cru_buttons?form_name=house_hunting" style="width:100%; height: 20vh; font-size: 20px; line-height: 18vh; vertical-align: middle;">House Hunting</a>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<a class="btn btn-primary" href="/cru_buttons?form_name=job_listing" style="width:100%; height: 20vh; font-size: 20px; line-height: 18vh; vertical-align: middle;">Job Listing</a>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-12">
					<a class="btn btn-primary" href="/cru_buttons?form_name=job_hunting" style="width:100%; height: 20vh; font-size: 20px; line-height: 18vh; vertical-align: middle;">Job Hunting</a>
				</div>
			</div><br>
		</div>
	</div>
</div>
@endsection