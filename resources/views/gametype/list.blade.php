@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Manager Game type</h1>
		<a class="btn btn-info pull-right" href="{{ url('/new-gametype') }}">New Game Type</a>
	</div>
	@if(Session::has('message'))
		<div class="alert alert-info">
			{!! Session::get('message') !!}
		</div>
	@endif
	<!--empty list -->
	@if (count($data) > 0)
		<table class="table">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Name</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    @foreach ($data as $item)
		      <tr>
		        <td>{!! $item->id !!}</td>
		        <td>
	        		<a href="<?php echo URL::to('/gametype') ?>/{{ $item->id }}"> {!! $item->name !!} </a>
		        </td>	        
		        <td width="150"><a href="{!! URL::to('/gametype/'.$item->id.'/edit') !!}">Edit</a> | <a href="{!! URL::to('/delete_gametype/'.$item->id) !!}" onclick="return checkDel()">Delete</a></td>
		      </tr>
			@endforeach

		    </tbody>
		</table>
	@else
	    <h2>Empty</h2>
	@endif
@stop