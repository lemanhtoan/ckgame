@extends('layouts.sidebar')
@section('content')
	<div class="jumbotron">
		<h1>{!! $contact->product_name !!}</h1>
		<p>{!! $contact->contact_email !!} </p>
		<p>
			{!! $contact->contact_message !!} 
		</p>
		<p> Status: 
			@if ($contact->contact_status == 1)
				Not Reply
			@else
				Reply
			@endif
		</p>
	</div>	
@stop