@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>User Pay</h1>
		@if(Session::has('message'))
			<div class="alert alert-info">
				{!! Session::get('message') !!}
			</div>
		@endif
	</div>
	<form method="post" action="../payToUser">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="userId" value="{!! $data !!}">
            <div class="form-group">
                <label class="control-label" for="">Money pay</label>
                <!-- Money pay (Max: $<?php //echo $user->mount_current; ?>) -->
                <input class="form-control" id="value" name="value"  type="number" max="<?php //echo $user->mount_current; ?>" min="0" step="1" pattern="\d*" required/>
            </div>
            <div class="form-group"> 
                <button class="btn btn-primary " name="submit" type="submit">Submit</button>
            </div>
    </form>
@stop