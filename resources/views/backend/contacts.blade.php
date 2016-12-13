@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Manager contact</h1>
	</div>
	
	<div class="pull-right">
		<p style="font-weight: bold"> Page {{ $contacts->currentPage() }} of {{ $contacts->lastPage() }} </p>
	</div>	

	<!--empty list product-->
	@if (count($contacts) > 0)
		<table class="table">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Name</th>
		        <th>Email</th>
		        <th>Message</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>

		    @foreach ($contacts as $contact)
		      <tr>
		        <td>{!! $contact->id !!}</td>
		        <td>
		        	<a href="<?php echo URL::to('/contact') ?>/{{ $contact->id }}">
		        		{!! $contact->contact_name !!}
		        	</a>
		        </td>
		        <td>{!! $contact->contact_email !!}</td>
		        <td>{!! $contact->contact_message !!}</td>
		        <td width="150"><a href="{!! URL::to('/edit/'.$contact->id) !!}">Edit</a> | <a href="{!! URL::to('/delete/'.$contact->id) !!}" onclick="return checkDel()">Delete</a></td>
		      </tr>
			@endforeach

		    </tbody>
		</table>

		<div class="pull-right">
			<div class="pagination"> {!! $contact->render() !!} </div>
		</div>


	@else
	    <h2>Empty contact</h2>
	@endif
@stop