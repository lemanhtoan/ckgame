@extends('layouts.default')
@section('content')
	<h2>Game type</h2>
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
				{!! Form::model($item, [
					'method' => 'PATCH',
					'route' => ['gametype.update', $item->id]
				]) !!}

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{ $item->id }}{{ old('id') }}">

				<div class="form-group">
					<label for="">Game type name:</label>
					<input required="required" value="@if(!old('name')){{$item->name}}@endif{{ old('name') }}" placeholder="Enter name" type="text" name ="name" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Game link get:</label>
					<input required="required" value="@if(!old('link_get')){{$item->link_get}}@endif{{ old('link_get') }}" placeholder="Enter link" type="text" name ="link_get" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Min price:</label>
					<input required="required" value="@if(!old('min_price')){{$item->min_price}}@endif{{ old('min_price') }}" placeholder="Enter min price" type="number" name ="min_price" min="0" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Max price:</label>
					<input required="required" value="@if(!old('max_price')){{$item->max_price}}@endif{{ old('max_price') }}" placeholder="Enter max price" type="number" name ="max_price" min="0" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Hour clone:</label>
					<input value="@if(!old('time_clone')){{$item->time_clone}}@endif{{ old('time_clone') }}" placeholder="Enter hour clone" type="number" name ="time_clone" min="0"  max="23" class="form-control" />
				</div>
				<div class="form-group">
					<label for="">Is default load:</label>
					<select name="default_load" id="default_load" class="form-control">
						<option value=""></option>
						<option value="1" <?php if (isset($item->default_load)) {if ($item->default_load == 1) {echo 'selected';}} ?>>Yes</option>
						<option value="0" <?php if (isset($item->default_load)) {if ($item->default_load != 1) {echo 'selected';}} ?>>No</option>
					</select>
				</div>
				<input type="submit" name='save' class="btn btn-success" value = "Save"/>
			</form>
		</div>
	</div>
@stop