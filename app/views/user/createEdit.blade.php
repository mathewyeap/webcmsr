@extends('layouts.main')

@section('title') WebCMS User Details @stop
@section ('heading') WebCMS User Details @stop

@section('page-info')
	Note: WebCMS emails will send to both your primary email and your alternative email
@stop

@section('content')

@if (isset($eUser))
	{{ BootForm::openHorizontal(3, 9)->put()->action(URL::route('user.update', [$eUser->id])) }}
	{{ BootForm::bind($eUser) }}
@else
	{{ BootForm::open()->post()->action(URL::route('user.store')) }}
@endif

<div class="row">
	<div class="col-sm-6">
@if (isset($eUser))
		{{ BootForm::text('ID:', 'id')->disable() }}
@endif
		{{ BootForm::text('User name:', 'username')->disable( ! Permission::hasMinRole('SA')) }}
		{{ BootForm::text('Title:', 'title')->disable( ! Permission::hasMinRole('SA')) }}
		{{ BootForm::text('Family name:', 'family_name')->disable( ! Permission::hasMinRole('SA')) }}
		{{ BootForm::text('Given name:', 'given_name')->disable( ! Permission::hasMinRole('SA')) }}
		<div class="row">
			<div class="col-xs-12">
				<label class="col-sm-3 control-label">Gender:</label>
			</div>
		</div>
		{{ BootForm::radio('Male', 'gender', 'M')->disable( ! Permission::hasMinRole('SA')) }}
		{{ BootForm::radio('Female', 'gender', 'F')->disable( ! Permission::hasMinRole('SA')) }}
		{{ BootForm::text('Display Name:', 'display_name')->disable( ! Permission::hasMinRole('SA')) }}
	</div>
	<div class="col-sm-6">
		{{ BootForm::datePicker('Birthday:', 'birthday') }}
		<script>
			$(function() {
				$('#birthday').parent().datetimepicker({
					pickTime: false
				});
			});
		</script>
		{{ BootForm::homePhone('Home Phone:', 'home_phone') }}
		{{ BootForm::mobile('Mobile:', 'mobile') }}
		{{ BootForm::email('Email:', 'email') }}
		{{ BootForm::text('Homepage:', 'home_page')->setAttribute('type', 'url') }}
		{{ BootForm::submit('Save', 'btn-success pull-right') }}
	</div>
</div>
{{ BootForm::close() }}

@stop
