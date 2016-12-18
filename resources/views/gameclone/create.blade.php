@extends('layouts.default')
@section('content')
	<h2>Create new game type</h2>
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
	<div class="row">
		<div class="col-md-12">
			<form action="new-gameclone" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="">Game type clone:</label>
					<select name="clonedata" id="clonedata" class="form-control" required>
						<option value=""></option>
						@if (count($data) > 0)
							@foreach ($data as $item)
								<option value="{!! $item->id !!}">{!! $item->name !!}</option>
							@endforeach
						@endif
					</select>
				</div>
				<input type="submit" name='get' class="btn btn-success" value = "Get"/>
			</form>
		</div>
	</div>
@stop