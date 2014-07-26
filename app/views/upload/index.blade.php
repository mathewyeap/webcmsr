@extends('layouts.pagination')

@section('title') Course file uploads @stop
@section('heading') Uploaded files in this course @stop

@section('pagination-thead')
  <th>id</th>
  <th>display_name</th>
  <th>mime_type</th>
  <th>size</th>
  <th>creator</th>
  <th>created_at</th>
  {{ Permission::hasMinRole(Permission::ROLE_SYSTEM_ADMIN) ? '<th>Action</th>' : '' }}
@stop

@section('pagination-tbody')
	@foreach ($pagination as $upload)
		<tr>
			<td>{{ $upload->id }}
			<td>{{{ $upload->display_name }}}</td>
		  	<td>{{{ $upload->mime_type }}}</td>
		  	<td>{{{ $upload->size }}}</td>
		  	<td>{{ $upload->creator->display_name }}</td>
		  	<td>{{ $upload->created_at }}</td>

			@if (Permission::hasMinRole(Permission::ROLE_SYSTEM_ADMIN))
				<td>
					@if ( ! File::exists($upload->path()))
						<span class="text-danger">Error! The upload is in the database, but is no longer stored on disk.</span>
					@else
						<a class="btn btn-default btn-sm"
							href="{{ URL::route('course.upload.show', [$_course->id, $upload->id]) }}">
							<i class="glyphicon glyphicon-eye-open"></i>
						</a>

						<a class="btn btn-default btn-sm"
							href="{{ URL::action('UploadController@getDownload', [$_course->id, $upload->id]) }}">
							<i class="glyphicon glyphicon-download-alt"></i>
						</a>
					@endif

					{{ Form::deleteForm(URL::route('course.upload.destroy', [$_course->id, $upload->id]), ['style' => 'display:inline']) }}
				</td>
			@endif
		</tr>
	@endforeach
@stop
