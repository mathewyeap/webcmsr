@extends('layouts.modal')

@section('modal-title')
	Do you really want to delete this notice?
@stop

@section('modal-form-open')
	{{ BootForm::open()->delete()->action(URL::route('course.link.notice.destroy', [$_link->course_id, $_link->id, $notice->id])) }}
@stop

@section('modal-body')
	<div class="center-table">
		<div class="alert alert-danger">
			<i class="glyphicon glyphicon-exclamation-sign"></i> This action is irreversbile!
		</div>
	</div>
@stop

@section('modal-submit-button')
	<button type="submit" class="btn btn-danger">
		<i class="glyphicon glyphicon-trash"></i> Erase
	</button>
@overwrite
