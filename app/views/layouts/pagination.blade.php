@extends (isset($_course) ? 'layouts.course' : 'layouts.main')

@section('head')
	@parent
	<script>
		$(document).ready(function() {
			$('#search-wrapper').find('select').change(function() {
				$('#search-wrapper').find('form').first().submit();
			});	
		});
	</script>
@stop

@section('content')

@ifSectionFilled('search-form')
	<div id="search-wrapper" class="text-center well">
		@yield('search-form')
	</div>
	<hr>
@endif

@ifSectionFilled('actions')
	<div class="row">
		<div class="col-xs-12">
			@yield('actions')
		</div>
	</div>
@endif

<div class="row">
	<div class="col-xs-12">
		<span class="text-danger">{{ $pagination->getTotal() }} result(s)</span><br>
		{{ $pagination->appends(Request::except('page'))->links() }}

		<div class="table-responsive">
			<table id="pagination-table" class="table table-striped">
				<thead>
					<tr class="{{ isset($_colourScheme) ? 'cs-course' : 'cs-main' }}">
						@yield('pagination-thead')
					</tr>
				</thead>
				<tbody>
					@yield('pagination-tbody')
				</tbody>
			</table>
		</div>

		{{ $pagination->appends(Request::except('page'))->links() }}
	</div>
</div>


@stop