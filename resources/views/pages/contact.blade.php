@extends('layouts.default')
@section('content')
	<h2>Contact page</h2>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div id="googleMap"></div>
			</div>
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
		</div>
	</div>

@stop