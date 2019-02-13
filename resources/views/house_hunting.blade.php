@extends('layouts.app')

@section('content')
<form id="form" class="form-horizontal" method="POST" action="/application_form?form_name={{$form_name}}" enctype="multipart/form-data" autocomplete="off">
	{{ csrf_field() }}
	<input type="hidden" name="form_name" value="{{$form_name}}" />
	<input type="hidden" name="serial_no" value="{{$id}}" />
	<input type="hidden" name="pin" value="{{$pin}}" />
<div class="container-fluid" >
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">House Hunting Form</h1>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<a href="/">Home</a> >> <a href="/cru_buttons?form_name={{$form_name}}">{{$form_name}}</a> >> <a>form serial_no:{{$id}}</a>
				</div>
			</div>
			<hr>
			
			@if($record !== '')
			@foreach(json_decode($record->images)??[] as $image)
			<div class="row">
				<div class="col-md-12">
					<img src="/storage/app/{{$image->path}}" alt="Add Photo">
					<p>{{$image->name}}</p>
				</div>
			</div>
			@endforeach
			@endif
		    <div class="row">
				<div class="col-md-12">
					<input type="file" name="images[]" id="images" multiple style="visibility: hidden">
					<label for="images"><img src="https://via.placeholder.com/480x100?text=Add+Photos" alt="Add Photo" style="width: 100%"></label>
				</div>
			</div>
			@if($record !== '')
			@foreach(json_decode($record->attachments)??[] as $attachment)
			<div class="row">
				<div class="col-md-6">
					<p>{{$attachment->name}}</p>
				</div>
				<div class="col-md-6">
					<a href="/storage/app/{{$attachment->path}}">download file</a>
				</div>
			</div>
			@endforeach
			@endif
			<div class="row">
				<div class="col-md-12">
					<input type="file" name="attachments[]" id="attachments" multiple style="visibility: hidden">
					<label for="attachments"><img src="https://via.placeholder.com/480x100?text=Add+Attachements" alt="Add Attachements" 	style="width: 100%"></label>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right">Serial Number:</label>
				</div>
				<div class="col-md-6">
					<p class="well well-sm">{{$id}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="tenant_name">Tenant Name</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Tenant Name" name="tenant_name" id="tenant_name"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="size">Size</label>
				</div>
				<div class="col-md-6">
					<Select class="form-control" name="size" id="size">
						<option>1 BHK</option><option>2 BHK</option><option>3 BHK</option><option>>3 BHK</option>
					</Select>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="looking_for">Looking For</label>
				</div>
				<div class="col-md-6">
					<Select class="form-control" name="looking_for" id="looking_for">
						<option>Rent</option><option>Lease</option><option>PG</option>
					</Select>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="no_of_people_to_stay">No. of People To Stay</label>
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" placeholder="No. of People To Stay" name="no_of_people_to_stay" id="no_of_people_to_stay"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="price_range">Price Range</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Price" name="price_range" id="price_range"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="locality">Locality</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Locality" name="locality" id="locality"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="house_description">House Description</label>
				</div>
				<div class="col-md-6">
					<textarea rows="3" class="form-control" placeholder="House Description" name="house_description" id="house_description"></textarea>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="contact_number">Contact Number</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Phone Number / email-id etc" name="contact_number" id="contact_number"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="spin">Secret PIN</label>
				</div>
				<div class="col-md-6">
					<input type="number" class="form-control" placeholder="4 digit Secret PIN" name="spin" id="spin"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<input id="draft" type="submit" class="btn btn-primary" name="submit" value="Save Draft">
					<input type="submit" class="btn btn-primary" name="submit" value="Final Submit">
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<h3>*Please remember <strong>serial number and secret pin</strong> for re-opening the form.</h3>
				</div>
			</div>
		</div>
	</div><br>
</div>
</form>

<script>
document.getElementById("images").onchange = function() {
	if(document.getElementById("spin").value!==""){
		document.getElementById("draft").click();
	}else{
		alert("Please Enter Secret PIN");
	}
};
document.getElementById("attachments").onchange = function() {
    if(document.getElementById("spin").value!==""){
		document.getElementById("draft").click();
	}else{
		alert("Please Enter Secret PIN");
	}
};
@if($record !== '')
	$("#tenant_name").val("{{$record->tenant_name}}");
	$("#size").val("{{$record->size}}");
	$("#looking_for").val("{{$record->looking_for}}");
	$("#no_of_people_to_stay").val("{{$record->no_of_people_to_stay}}");
	$("#price_range").val("{{$record->price_range}}");
	$("#locality").val("{{$record->locality}}");
	$("#house_description").val("{{str_replace(array("\r", "\n", '\n\n'), '\n', $record->house_description)}}");
	$("#contact_number").val("{{$record->contact_number}}");
	$("#spin").val("{{$record->spin}}");
@endif
</script>
@endsection