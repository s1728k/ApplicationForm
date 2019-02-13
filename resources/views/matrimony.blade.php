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
					<h1 class="text-center">Matrimony Form</h1>
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
					<label class="text-right" for="name">Name</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Applicant Name" name="name" id="name"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="sex">Sex</label>
				</div>
				<div class="col-md-6">
					<Select class="form-control" name="sex" id="sex">
						<option>Male</option><option>Female</option>
					</Select>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="date_time_of_birth">Date and Time Of Birth</label>
				</div>
				<div class="col-md-6">
					<input type="datetime-local" class="form-control" name="date_time_of_birth" id="date_time_of_birth"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="place_of_birth">Place Of Birth</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Bengaluru / India" name="place_of_birth" id="place_of_birth"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="religion">Religion</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Religion" name="religion" id="religion"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="caste">Caste</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Caste" name="caste" id="caste"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="gothram">Gothram</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Gothram" name="gothram" id="gothram"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="education">Education</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Education" name="education" id="education"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="profession">Profession</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Profession" name="profession" id="profession"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="income">Income</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Income" name="income" id="income"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="property">Property</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Property" name="property" id="property"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="likes_and_dislikes">Likes and Dislikes</label>
				</div>
				<div class="col-md-6">
					<textarea rows="3" class="form-control" placeholder="Likes and Dislikes" name="likes_and_dislikes" id="likes_and_dislikes"></textarea>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="residential_address">Residential Address</label>
				</div>
				<div class="col-md-6">
					<textarea rows="3" class="form-control" placeholder="Residential Address" name="residential_address" id="residential_address"></textarea>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="permanent_address">Permanent Address</label>
				</div>
				<div class="col-md-6">
					<textarea rows="3" class="form-control" placeholder="Permanent Address" name="permanent_address" id="permanent_address"></textarea>
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
    document.getElementById("draft").click();
};
document.getElementById("attachments").onchange = function() {
    document.getElementById("draft").click();
};
@if($record !== '')
	$("#name").val("{{$record->name}}");
	$("#sex").val("{{$record->sex}}");
	$("#date_time_of_birth").val("{{$record->date_time_of_birth}}");
	$("#place_of_birth").val("{{$record->place_of_birth}}");
	$("#religion").val("{{$record->religion}}");
	$("#caste").val("{{$record->caste}}");
	$("#gothram").val("{{$record->gothram}}");
	$("#education").val("{{$record->education}}");
	$("#profession").val("{{$record->profession}}");
	$("#income").val("{{$record->income}}");
	$("#property").val("{{$record->property}}");
	$("#likes_and_dislikes").val("{{str_replace(array("\r", "\n", '\n\n'), '\n', $record->likes_and_dislikes)}}");
	$("#residential_address").val("{{str_replace(array("\r", "\n", '\n\n'), '\n', $record->residential_address)}}");
	$("#permanent_address").val("{{str_replace(array("\r", "\n", '\n\n'), '\n', $record->permanent_address)}}");
	$("#contact_number").val("{{$record->contact_number}}");
	$("#spin").val("{{$record->spin}}");
@endif
</script>
@endsection