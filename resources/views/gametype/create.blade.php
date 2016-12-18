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
			<form action="new-gametype" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="">Game type name:</label>
					<input required="required" value="{{ old('name') }}" placeholder="Enter name" type="text" name ="name" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Game link get:</label>
					<input required="required" value="{{ old('link_get') }}" placeholder="Enter link" type="text" name ="link_get" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Min price:</label>
					<input required="required" value="{{ old('min_price') }}" placeholder="Enter min price" type="number" name ="min_price" min="0" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Max price:</label>
					<input required="required" value="{{ old('max_price') }}" placeholder="Enter max price" type="number" name ="max_price" min="0" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Hour clone:</label>
					<input value="{{ old('time_clone') }}" placeholder="Enter hour clone" type="number" name ="time_clone" min="0"  max="23" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Description:</label>
					<textarea class="form-control" rows="5" name="description"></textarea>
				</div>
				<input type="submit" name='save' class="btn btn-success" value = "Save"/>
			</form>
		</div>
	</div>
@stop