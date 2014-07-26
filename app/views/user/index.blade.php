@extends('layouts.pagination')

@section('title') WebCMS Users @stop
@section('heading') WebCMS Users @stop

@section('actions')
	{{ HTML::linkRoute('user.create', '[Add New WebCMS User]', null,
		['class' => 'btn btn-primary btn-sm pull-right']) }}
@stop

@section('pagination-thead')
	<th>ID</th>
	<th>Title</th>
	<th>Name</th>
	<th>Gender</th>
	<th>Contact</th>
	<th>Birthday</th>
	<th>Actions</th>
@stop

@section('pagination-tbody')
	@foreach ($pagination as $user)
		<tr>
			<td>{{{ $user->id }}}</td>
			<td>{{{ $user->title }}}</td>
			<td>{{{ $user->sortName() }}}</td>
			<td>{{{ $user->gender }}}</td>
			<td>
				@if (isset($user->home_phone))
					H: {{{ $user->home_phone }}}<br>
				@endif
				@if (isset($user->mobile))
					M: {{{  $user->mobile }}}<br>
				@endif
				@if (isset($user->email))
					E: {{ HTML::mailto($user->email) }}
				@endif
			</td>
			<td>{{{ $user->birthdayStr() }}}</td>
			<td>
				<a class="btn btn-default btn-sm" href="{{ URL::route('user.edit', [$user->id]) }}"><i class="glyphicon glyphicon-pencil"></i></a>
			</td>
		</tr>
	@endforeach
@stop

@section('modals')
@stop
