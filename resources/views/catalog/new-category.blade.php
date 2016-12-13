@extends('layouts.sidebar')
@section('content')
	{!! Form::open(array('url' => 'save-category')) !!}
	
	<div class="jumbotron">
		<h1>New category</h1>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-info">
			{!! Session::get('message') !!}
		</div>
	@endif

	@if ($errors->has())
	    <div class="alert alert-danger">
	        @foreach ($errors->all() as $error)
	            {{ $error }}<br>        
	        @endforeach
	    </div>
    @endif

	<div class="form-group @if ($errors->has('title')) has-error @endif">
		{!! Form::label('Title *') !!}
		{!! Form::text('title', null, array('placeholder'=>'Enter category name...', 'class' => 'form-control')) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
	</div>

	{!! Form::close() !!}
@stop 
