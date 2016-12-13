@extends('layouts.sidebar')
@section('content')
	{!! Form::open(array('url' => 'save-product', 'files'=>true)) !!}
	
	<div class="jumbotron">
		<h1>Manager product</h1>
	</div>

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

	<div class="form-group @if ($errors->has('product_name')) has-error @endif">
		{!! Form::label('Product Name *') !!}
		{!! Form::text('product_name', null, array('placeholder'=>'Enter product name ...', 'class' => 'form-control')) !!}
	</div>

	<div class="form-group @if ($errors->has('product_price')) has-error @endif">
		{!! Form::label('Product Price *') !!}
		{!! Form::text('product_price', null, array('placeholder'=>'Enter product price ...', 'class' => 'form-control')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('Product Image') !!}
		{!! Form::file('product_image', null) !!}
	</div>

	<div class="form-group">
		{!! Form::label('Product Description') !!}
		{!! Form::textarea('product_description', null, array('class' => 'form-control', 'id'=>'product_description')) !!}
	</div>

	<div class="form-group @if ($errors->has('cate_id')) has-error @endif">
		{!! Form::label('Category *') !!}
		<?php echo Form::select('cate_id', $cates, null, ['class' => 'form-control','placeholder' => '-- category --']); ?>
	</div>

	<div class="form-group">
		{!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
	</div>

	{!! Form::close() !!}
@stop 
