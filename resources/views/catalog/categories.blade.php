@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Manager category</h1>
	</div>
	@if(Session::has('message'))
		<div class="alert alert-info">
			{!! Session::get('message') !!}
		</div>
	@endif
	<!--empty list -->
	@if (count($cates) > 0)
		<table class="table">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Title</th>
		        <th>Delete</th>
		      </tr>
		    </thead>
		    <tbody>

		    @foreach ($cates as $cate)
		      <tr>
		        <td>{!! $cate->id !!}</td>
		        <td>
	        		<a href="<?php echo URL::to('/category') ?>/{{ $cate->id }}"> {!! $cate->title !!} </a>
		        </td>	        
		        <td width="150"><a href="{!! URL::to('/delete_cate/'.$cate->id) !!}" onclick="return checkDel()">Delete</a></td>
		      </tr>
			@endforeach

		    </tbody>
		</table>
	@else
	    <h2>Empty category</h2>
	@endif
@stop