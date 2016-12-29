@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Manager User</h1>
		@if(Session::has('message'))
			<div class="alert alert-info">
				{!! Session::get('message') !!}
			</div>
		@endif
	</div>
	@if (count($data) > 0)
		<div class="pull-right">
			<p style="font-weight: bold"> Page {{ $data->currentPage() }} of {{ $data->lastPage() }} </p>
		</div>
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($data as $item)
				<tr>
					<td>{!! $item->id !!}</td>
					<td>{!! $item->name !!}</td>
					<td>{!! $item->email !!}</td>
					<td>
						@if ($item->status == 1)
							<a href="<?php echo URL::to('/user/block') ?>/{{ $item->id }}"> Block </a>
							|
							<a href="{!! URL::to('/payUser/'.$item->id) !!}" onclick="return checkPay()">Pay</a>
							|
							<a href="{!! URL::to('/minusUser/'.$item->id) !!}" onclick="return checkPay()">Minus money</a>
						@endif
					</td>
				</tr>
			@endforeach

			</tbody>
		</table>
		<div class="pull-right">
			<div class="pagination"> {!! $data->render() !!} </div>
		</div>
	@else
		<h2>Empty</h2>
	@endif
@stop