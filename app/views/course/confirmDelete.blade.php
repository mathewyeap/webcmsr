@extends('layouts.modal')

@section('modal-title')
	Do you really want to delete course {{{ $course->code }}}?
@stop

@section('modal-form-open')
	{{ BootForm::open()->delete()->action(URL::route('course.destroy', [$course->id])) }}
@stop

@section('modal-body')
	<div class="center-table">
		<div class="alert alert-danger">
			<i class="glyphicon glyphicon-exclamation-sign"></i>
			All data associated with <b>{{{ $course->code }}}: {{{ $course->title }}}</b> will be lost!
		</div>
	</div>
@stop

@section('modal-submit-button')
	<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Erase</button>
@overwrite
