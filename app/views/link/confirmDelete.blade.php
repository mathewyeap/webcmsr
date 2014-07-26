@extends('layouts.modal')

@section('modal-title')
	Do you really want to remove this link?
@stop

@section('modal-form-open')
	{{ BootForm::open()->delete()->action(URL::route('course.link.destroy', [$_course->id, $_link->id])) }}
@stop

@section('modal-body')
	<div class="center-table">
		<div class="alert alert-danger">
			<i class="glyphicon glyphicon-exclamation-sign"></i>
			All data associated with this link will be lost!
		</div>
	</div>
@stop

@section('modal-submit-button')
	<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Erase</button>
@overwrite
