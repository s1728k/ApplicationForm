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
					<h1 class="text-center">Job Hunting Form</h1>
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
					<input type="text" class="form-control" placeholder="Name" name="name" id="name"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="job_title">Job Title</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Job Title" name="job_title" id="job_title"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="job_description">Job Description</label>
				</div>
				<div class="col-md-6">
					<textarea rows="3" class="form-control" placeholder="Job Description" name="job_description" id="job_description"></textarea>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="skill_set">Skill Set</label>
				</div>
				<div class="col-md-6">
					<textarea rows="3" class="form-control" placeholder="Skill Set" name="skill_set" id="skill_set"></textarea>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="salary_expected">Salery Expected</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Salary Expected" name="salary_expected" id="salary_expected"/>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6">
					<label class="text-right" for="job_location">Job Location</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Job Location" name="job_location" id="job_location"/>
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
					<button type="submit" class="btn btn-primary">Save Draft</button>
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
    document.getElementById("form").submit();
};
document.getElementById("attachments").onchange = function() {
    document.getElementById("form").submit();
};
@if($record !== '')
	$("#name").val("{{$record->name}}");
	$("#job_title").val("{{$record->job_title}}");
	$("#job_description").val("{{str_replace(array("\r", "\n", '\n\n'), '\n', $record->job_description)}}");
	$("#skill_set").val("{{str_replace(array("\r", "\n", '\n\n'), '\n', $record->skill_set)}}");
	$("#salary_expected").val("{{$record->salary_expected}}");
	$("#job_location").val("{{$record->job_location}}");
	$("#contact_number").val("{{$record->contact_number}}");
	$("#spin").val("{{$record->spin}}");
@endif
</script>

@endsection