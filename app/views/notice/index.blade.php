@extends('layouts.course')

@section('title') Course Noticeboard @stop
@section('heading')
	{{{ $_link->name }}}
@stop

@section('content')

@if (Permission::hasMinRole('CA', $_link->course_id))
<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
			{{ HTML::linkRoute('course.link.notice.create', 'Add Notice', [$_link->course_id, $_link->id], ['class' => 'btn btn-primary btn-sm']) }}
		</div>
	</div>
</div>
<br>
@endif

<div class="row">
	<div class="col-sm-12">
		@if ($notices->isEmpty())
			<div class="text-center">
				There are no notices yet!
			</div>
		@else
			@foreach ($notices as $notice)
				<div class="panel panel-default">
					@if (Permission::hasMinRole('CA', $_link->course_id))
						<span class="pull-right" style="margin:4px">
							<a class="btn btn-default btn-sm" href="{{ URL::route('course.link.notice.edit', [$_link->course_id, $_link->id, $notice->id]) }}"><i class="glyphicon glyphicon-pencil"></i></a>

							<a class="btn btn-danger btn-sm" data-toggle="modal" href="{{ action('NoticeController@getConfirmDelete', [$_link->course_id, $_link->id, $notice->id]) }}" data-target="#"><i class="glyphicon glyphicon-remove"></i></a>
						</span>
					@endif

					<div class="panel-heading cs-course">
						<h4 class="panel-title">
							{{{ $notice->title }}}

							<small class="cs-course">
								Posted by {{{ $notice->creator->display_name.', '.date('D j M h:ia', strtotime($notice->created_at)) }}}
							</small>
						</h4>
					</div>
				  <div class="panel-body">
						{{ $notice->mesg }}
					</div>
			  	@if (isset($notice->attachment_id))
					  <div class="panel-footer">
				  		{{ HTML::linkRoute('course.upload.show', $notice->attachment->display_name, [$_course->id, $notice->attachment->id]) }}
				  		<a href="{{ URL::action('UploadController@getDownload', [$_course->id, $notice->attachment->id]) }}"><i class="glyphicon glyphicon-download-alt"></i></a>
					  </div>
			  	@endif
				</div>
			@endforeach
		@endif
	</div>
</div>

@stop

@section('modals')
@stop
