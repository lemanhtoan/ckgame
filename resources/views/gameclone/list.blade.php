@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Manager Game clone</h1>
		<a class="btn btn-info pull-right" href="{{ url('/new-gameclone') }}">New Game clone</a>
	</div>
	@if (count($data) > 0)
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Value</th>
				<th>Date</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($data as $item)
				<tr>
					<td>{!! $item->id !!}</td>
					<td>{!! $item->id_game !!}</td>
					<td>{!! $item->value !!}</td>
					<td>{!! $item->date_clone !!}</td>
				</tr>
			@endforeach

			</tbody>
		</table>
	@else
		<h2>Empty</h2>
	@endif
@stop