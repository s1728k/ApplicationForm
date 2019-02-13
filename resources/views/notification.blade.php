@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			{{-- <form class="form-horizontal" method="POST" action="{{env('APP_URL')}}/application_form?form_name={{$form_name}}">
				{{ csrf_field() }}
				<input type="hidden" name="form_name" value="{{$form_name}}" />
				<input type="hidden" name="cru" value="2" />
				<input type="hidden" name="serial_no" value="{{$id}}" />
				<input type="hidden" name="pin" value="{{$pin}}" />
				<button type="submit" class="btn btn-primary">Open Form</button>
			</form> --}}
			form_name: {{$form_name}}
			serial_no: {{$id}}
			pin: {{$pin}}
		</div>
	</div>
</div>
@endsection