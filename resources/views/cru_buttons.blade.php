@extends('layouts.app')

@section('content')

<div class="container-fluid" >
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">{{str_replace('App\\','',$title)}} Form</h1>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<a href="/">Home</a> >> <a>{{$form_name}}</a>
				</div>
			</div>
			<hr>

			<form class="form-horizontal" method="POST" action="/application_form?form_name={{$form_name}}">
			{{ csrf_field() }}
			<input type="hidden" name="form_name" value="{{$form_name}}" />
			<input type="hidden" name="cru" value="2" />
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="serial_no">Serial Number</label>
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" placeholder="Serial Number" name="serial_no" id="serial_no"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="pin">PIN</label>
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" placeholder="4 digit PIN" name="pin" id="pin"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<button class="btn btn-primary">Open Form</button>
				</div>
			</div>
			</form>
			<hr>
			<form class="form-horizontal" method="POST" action="/application_form?form_name={{$form_name}}">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary">New Form</button>
				</div>
			</div><br>
			</form>
		</div>
	</div><br>
</div>
@endsection