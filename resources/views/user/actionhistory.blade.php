@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>User Histoty Money - {!! $name !!}</h1>
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
				<th>Name</th>
				<th>Before amout</th>
				<th>Current amount</th>
				<th>action</th>
			</tr>
			</thead>
			<tbody>
			<?php $i=0;?>
			@foreach ($data as $item) <?php $i++; ?>
				<?php //echo "<pre>"; var_dump($item);?>
				<tr>
					<td>{!! $i !!}</td>
					<td>{!! $name !!}</td>
					<td>{!! $item->mount_before !!}</td>
					<td>{!! $item->mount_current !!}</td>
					<td><a href="{!! URL::to('/payUser/'.$item->id_user) !!}" onclick="return checkPay()">Pay</a></td>
				</tr>
			@endforeach

			</tbody>
		</table>
	@else
		<h2>Empty</h2>
	@endif
@stop