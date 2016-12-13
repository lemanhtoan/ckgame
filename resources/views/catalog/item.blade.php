@extends('layouts.sidebar')
@section('content')
	<div class="jumbotron">
		<h1>{!! $product->product_name !!} | ${!! $product->product_price !!} </h1>
		<p>
			@if (strlen($product->product_image) > 0)
			    <img class="img-product" src="../{!! $product->product_image !!}" alt="{!! $product->product_name !!}" width="200" height="150" title="{!! $product->product_name !!}">
			@else 
				<img class="img-product" src="../uploads/no-image.png" alt="No image" title="No image" width="200" height="150">
			@endif
		</p>
		<p>
			{!! $product->product_description !!} 
		</p>
	</div>	
@stop