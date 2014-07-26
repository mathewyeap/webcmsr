@extends('layouts.base')

@section('title') WebCMS @stop

@section('colours')
	<style>
		#left-side-menu {
			background-color: #202077 !important;
		}
	</style>
@stop

@section('menu')
	@include('partials.menus._main')
@stop

@section('run-menu-script')	
	<script>
		var $menu = $('#left-side-menu');
		$menu.mmenu({
			classes: '',
			position: "left",
			zposition: "back",
			slidingSubmenus: false,
			dragOpen: true,
		});
	</script>
@stop



@if (!Auth::check())
	@section('back-to-login')
		@include('partials._loginLink')
	@stop
@endif

@section('footer')
	@include('partials._footer')
@stop
