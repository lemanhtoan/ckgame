@extends('layouts.sidebar')
@section('content')
	ABOUT Page
{{-- 	<form action="{!! URL::route('language-chooser') !!}" method="post">
		
		<select name="locale">
			<option value="en">English</option>
			<option value="vn">VietNam</option>
		</select>
		<input type="submit" value="OK">
		{!! Form::token() !!}
	</form> --}}
	{!! trans('message.welcome') !!}
@stop