@extends('layouts.main')

@section('title') WebCMS2 - Information @stop
@section('heading') WebCMS2 - Information @stop

@section('content')
<div class="center-table text-center">
	<p>The following have made substantial contributions to WebCMS:</p>

	<dl class="dl-horizontal text-left">
		<dt>Siew Siew Ong</dt><dd>Built the original system (PHP3/MiniSQL)</dd>
		<dt>John Shepherd</dt><dd>Code/DB clean-up, MessageBoard <small>(1.0, 1.1)</small></dd>
		<dt>Kwanchai Eurviriyanukul</dt><dd>Partial port to PHP4/PostgreSQL</dd>
		<dt>Ted Tsao, Peter Wang</dt><dd>Completed port to PHP4/PostgreSQL</dd>
		<dt>Inny So, Vivien Choi</dt><dd>Assignment submission/marking system</dd>
		<dt>Ronny Santosa</dt><dd>MessageBoard (2.0)</dd>
		<dt>Niraj Bhawnani</dt><dd>Quizzes</dd>
		<dt>Nik Youdale</dt><dd>RSS feeds</dd>
		<dt>Zhang Liang Liang, Gong Zifei</dt><dd>New Assessment module</dd>
	</dl>

	<p>For more information about WebCMS, please contact:</p>
</div>

<div class="center-table">
	<address class="well">
		<strong>John Shepherd</strong><br>
		School of Computer Science and Engineering, UNSW<br>
		Email: {{ HTML::mailto('jas@cse.unsw.edu.au') }}<br>
		Homepage: {{ HTML::link('http://www.cse.unsw.edu.au/~jas/') }}
	</address>
</div>
@stop
