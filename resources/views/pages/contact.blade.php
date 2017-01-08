@extends('layouts.default')
@section('content')
	<h2>Contact page</h2>

	<p class="head"><img src="<?php echo url('/').'/public/image/slider1.jpg';?>"/></p>
	<div class="row">
		<div class="col-md-6">
			{!! Form::open(array('url' => 'send-contact')) !!}

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

			<div class="form-group @if ($errors->has('contact_name')) has-error @endif">
				{!! Form::label('Name *') !!}
				{!! Form::text('contact_name', null, array('placeholder'=>'Enter your name ...', 'class' => 'form-control')) !!}
			</div>

			<div class="form-group @if ($errors->has('contact_email')) has-error @endif">
				{!! Form::label('Email *') !!}
				{!! Form::text('contact_email', null, array('placeholder'=>'Enter your email ...', 'class' => 'form-control')) !!}
			</div>

			<div class="form-group @if ($errors->has('contact_message')) has-error @endif">
				{!! Form::label('Message *') !!}
				{!! Form::textarea('contact_message', null, array('class' => 'form-control')) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Send', array('class' => 'btn btn-primary')) !!}
			</div>

			{!! Form::close() !!}
		</div>
		<div class="col-md-6">
			<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.879222703553!2d105.80222931450409!3d20.99747798601529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acbd75d0bde5%3A0x6efc8a1ae66645ef!2zMTYyIE5ndXnhu4VuIEh1eSBUxrDhu59uZywgVGhhbmggWHXDom4gVHJ1bmcsIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1480758784639" width="565" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></p>
		</div>
	</div>

@stop