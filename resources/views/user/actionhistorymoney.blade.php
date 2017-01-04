@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>User History Money</h1>
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
				<tr>
					<td>{!! $i !!}</td>
					<td><a href="<?php echo URL::to('/user/') ?>/{{ $item->id_user }}">{!! $item->uName !!}</a></td>
					<td>{!! $item->mount_before !!}</td>
					<td><?php if ($i==1) :?><b class="green">{!! $item->mount_current !!}</b><?php else: ?> {!! $item->mount_current !!} <?php endif;?></td>
					<td><?php if ($i==1) :?><a href="{!! URL::to('/minusUser/'.$item->id_user) !!}" onclick="return checkPay()">Get money</a><?php endif;?></td>
				</tr>
			@endforeach

			</tbody>
		</table>
	@else
		<h2>Empty</h2>
	@endif
@stop