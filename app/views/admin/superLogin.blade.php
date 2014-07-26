@extends('layouts.main')

@section('title') Super Login @stop
@section('heading') Super Login @stop

@section('head')
@parent
	{{ HTML::style(asset('jquery-ui-1.10.4/css/ui-lightness/jquery-ui-1.10.4.min.css')) }}
	{{ HTML::script(asset('jquery-ui-1.10.4/js/jquery-ui-1.10.4.min.js')) }}
@stop

@section('page-info')
	<div class="text-center">
		Allows a user with the administrator role to log in as any other user.<br>
		Login as another user to confirm that the output they are seeing is correct.
	</div>
@stop

@section('content')

<div class="row">
	<div class="ui-widget col-sm-6 col-sm-offset-3 well" style="background:orange">
		{{ BootForm::open()->action(URL::action('AdminController@postSuperLogin')) }}
			{{ BootForm::text('Find a user:', 'user_id')->placeholder("Enter user's name") }}
			{{ BootForm::submit('Super Login', 'btn-success') }}
		{{ BootForm::close() }}
	</div>
</div>

<script>
var cache = {};
$( "#user_id" ).autocomplete({
	minLength: 2,
	source: function( request, response ) {
		var term = request.term;
		if ( term in cache ) {
			response( cache[ term ] );
			return;
		}

		$.getJSON( "{{ url('user/search') }}", request, function( data, status, xhr ) {
			console.log(data);
			cache[ term ] = data;
			response( data );
		});
	}
});
</script>

@stop
