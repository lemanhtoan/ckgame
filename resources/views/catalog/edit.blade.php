@extends('layouts.default')
@section('content')
	
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

	{!! Form::model($product, [
	    'method' => 'PATCH',
	    'files' =>true, //upload image
	    'route' => ['product.update', $product->id]
    ]) !!}

	<div class="form-group @if ($errors->has('product_name')) has-error @endif">
		{!! Form::label('Product Name *') !!}
		{!! Form::text('product_name', null, array('class' => 'form-control')) !!}
	</div>

	<div class="form-group @if ($errors->has('product_price')) has-error @endif">
		{!! Form::label('Product Price *') !!}
		{!! Form::text('product_price', null, array('class' => 'form-control')) !!}
	</div>
	
	<div class="form-group">
		@if (strlen($product->product_image) > 0)
		    <img class="img-product" src="../{!! $product->product_image !!}" alt="{!! $product->product_name !!}" width="200" height="150" title="{!! $product->product_name !!}">
		@else 
			<img class="img-product" src="../uploads/no-image.png" alt="No image" title="No image" width="200" height="150">
		@endif
	</div>


	<div class="form-group">
		{!! Form::label('Product Image') !!}
		{!! Form::file('product_image', null) !!}
	</div>

	<div class="form-group @if ($errors->has('product_description')) has-error @endif">
		{!! Form::label('Product Description *') !!}
		{!! Form::textarea('product_description', null, array('class' => 'form-control', 'id'=>'product_description')) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
	</div>

	{!! Form::close() !!}

@stop
