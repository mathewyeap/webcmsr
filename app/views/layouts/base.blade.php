<!DOCTYPE html>
<html>
<head>
@section('head')
	<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="{{ asset('icons/bart.ico') }}">
	
	<!-- jQuery -->
	{{ HTML::script(asset('js/jquery-2.1.0.js')) }}

	<!-- jQuery UI -->
	{{ HTML::style(asset('css/jquery-ui-1.10.4.min.css')) }}

	<!-- jQuery mmenu -->
	{{ HTML::style(asset('css/jquery.mmenu.all.css')) }}
	{{ HTML::style(asset('css/jquery.mmenu.widescreen.css'), ['media' => 'all and (min-width: 480px)']) }}

	<!-- Bootstrap -->
	{{ HTML::style(asset('bootstrap/css/bootstrap.min.css')) }}

	<!-- font-awesome -->
	{{ HTML::style(asset('font-awesome/css/font-awesome.min.css')) }}

	<!-- jschr/bootstrap-modal -->
	{{ HTML::style(asset('css/bootstrap-modal-bs3patch.css')) }}
	{{ HTML::style(asset('css/bootstrap-modal.css')) }}

	<!-- bootstrap-datetimepicker -->
	{{ HTML::style(asset('css/bootstrap-datetimepicker.min.css')) }}

	<!-- WebCMS -->	
	{{ HTML::style(asset('css/webcmsr.css')) }}
@show
@yield('colours')
</head>

<body>
@section('body')

	<div id="page" class="container-fluid">
		<a id="open-icon-header" class="btn mm-fixed-top" href="#left-side-menu">
			<i class="glyphicon glyphicon-list"></i>
		</a>
@yield('menu')
@yield('header')

@ifSectionFilled ('heading')
	<div class="page-header text-center"><h1>@yield('heading')</h1></div>
@endif

@ifSectionFilled ('page-info')
	<div id="page-info" class="center-table">
		@yield('page-info')
	</div>
@endif

@include('partials._notifications')

@yield('content')

@yield('back-to-login')

@yield('footer')
	</div><!-- /.page -->
	
@ifSectionFilled('modals')
	<div id="ajax-modal" class="modal container fade" tabindex="-1" style="display:none"></div>
	@yield('modals')

	<script>
		var $modal = $('#ajax-modal');
		 
		$('*[data-toggle=modal]').on('click', function(){
			var url = $(this).attr('href');
			$modal.load(url, '', function() {
				$modal.modal();
		  });
		});
	</script>
@endif

@show

@section('scripts')
	<script>
		$("form.delete-form").submit(function() {
			return confirm('Are you absolutely sure you want to delete this item?');
		});

		$(document).ready(function() {
			$('*[title]').tooltip({animation: false, placement: 'bottom'});		
		});
	</script>

	<!-- jQuery UI -->
	{{ HTML::script(asset('js/jquery-ui-1.10.4.min.js')) }}

	<!-- Bootstrap -->
	{{ HTML::script(asset('bootstrap/js/bootstrap.js')) }}

	<!-- jQuery mmenu -->
	{{ HTML::script(asset('js/jquery.mmenu.min.all.js')) }}
	@yield('run-menu-script')

	<!-- jschr/bootstrap-modal -->
	{{ HTML::script(asset('js/bootstrap-modalmanager.js')) }}
	{{ HTML::script(asset('js/bootstrap-modal.js')) }}

	<!-- bootstrap-datetimepicker -->
	{{ HTML::script(asset('js/moment.min.js')) }}
	{{ HTML::script(asset('js/bootstrap-datetimepicker.min.js')) }}

	<!-- WebCMS -->	
	{{ HTML::script(asset('js/webcmsr.js')) }}
@show
</body>
</html>
