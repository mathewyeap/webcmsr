<nav id="left-side-menu">
	<div>
@yield('menu-header')
		<ul>
@yield('menu-content')
		</ul>

		<div>
			<b>{{ Auth::check() ? 'Logged in as' : 'Status' }}:</b><br>
			{{{ Auth::check() ? Auth::user()->display_name : 'Not logged in' }}}<br>
			{{ Auth::check() ? Permission::role().'<br>' : '' }}<br>


			{{ Auth::check() ?
				BootForm::open()->id('login-form')->delete()->action(URL::route('session.destroy', [0])) :
				BootForm::open()->id('login-form')->action(URL::route('session.store')) }}

@if (!Auth::check())
			{{ BootForm::text('Username:', 'username') }}
			{{ BootForm::password('Password:', 'password') }}
@endif

			{{ BootForm::submit(Auth::check() ? 'Logout' : 'Login')->addClass('btn-sm btn-success') }}
			{{ BootForm::close() }}
		</div>
	</div>
</nav>

