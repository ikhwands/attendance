@extends('template.skeleton')

@section('title')
{{ _('About us') }}
@stop

@section('content')
	<div class="container">
		<h1>{{ _('About us') }}</h1>
		@include('template.messages')

		<div class="well">
			<p>Visit our Website in <a href="http://www.saungit.org/" target="_blank">here</a>. For any support version just contact awangga@passionit.co.id</p>
			<p>Kunjungi juga kami di <a href="http://dodis.wordpress.com/">Dodis gituloh!</a></p>
			<p>Kunjungi juga kami di <a href="http://dodis.wordpress.com/">Dodis gituloh!</a></p>

		</div>
	</div>	
@stop

