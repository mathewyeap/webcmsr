@extends('layouts.course')

@section('title') Create/Edit Notice @stop
@section('heading') Create/Edit Notice @stop

@section('head')
	@parent
	{{ HTML::style(asset('css/summernote.css')) }}
@stop

@section('content')

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">

			@if (isset($eNotice))
				{{ BootForm::open()->multipart()->put()->action(URL::route('course.link.notice.update', [$_course->id, $_link->id, $eNotice->id])) }}
				{{ BootForm::bind($eNotice) }}
			@else
				{{ BootForm::open()->multipart()->action(URL::route('course.link.notice.store', [$_course->id, $_link->id])) }}
			@endif

			{{ BootForm::text('Title:', 'title') }}
			{{ BootForm::textarea('Message:', 'mesg') }}
			{{ BootForm::file('Attachments:', 'attachments') }}
			{{ BootForm::submit('Post', 'btn-success pull-right') }}
		  {{ BootForm::close() }}

	</div>
</div>

@stop

@section('scripts')
	@parent
	{{ HTML::script(asset('js/summernote.min.js')) }}
	<script>
		$(function() {
			$('#mesg').summernote();
		});
	</script>
@stop
