@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>User History - {!! $name !!} (Play game)</h1>
		@if(Session::has('message'))
			<div class="alert alert-info">
				{!! Session::get('message') !!}
			</div>
		@endif
	</div>
	@if (count($data) > 0)
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Game Name</th>
				<th>User</th>
				<th>Number</th>
				<th>Price</th>
				<th>Time Play</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($data as $item)
				<tr>
					<td>{!! $item->gUGameId !!}</td>
					<td>{!! $item->gTName !!}</td>
					<td><a href="<?php echo URL::to('/user/') ?>/{{ $item->uId }}">{!! $item->uName !!}</a></td>
					<td>{!! $item->gUValue !!}</td>
					<td>${!! $item->gUPrice !!}</td>
					<td>{!! $item->gUDatePlay !!}</td>
				</tr>
			@endforeach

			</tbody>
		</table>
	@else
		<h2>Empty</h2>
	@endif
@stop