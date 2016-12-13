@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Manager product</h1>
	</div>
	
	<!--empty list product-->
	@if (count($products) > 0)
		<table class="table">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Name</th>
		        <th>Image</th>
		        <th>Price</th>
		        <th>Description</th>
		        <th>Category</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>

		    @foreach ($products as $product)
		      <tr>
		        <td>{!! $product->id !!}</td>
		        <td>
		        	<a href="<?php echo URL::to('/product') ?>/{{ $product->id }}">
		        		{!! $product->product_name !!}
		        	</a>
		        </td>
		        <td>
		        	@if (strlen($product->product_image) > 0)
		        		<a href="<?php echo URL::to('/product') ?>/{{ $product->id }}">
					    	<img class="img-product" src="../{!! $product->product_image !!}" alt="{!! $product->product_name !!}" width="200" height="150" title="{!! $product->product_name !!}">
					    </a>
					@else 
						<a href="<?php echo URL::to('/product') ?>/{{ $product->id }}">
							<img class="img-product" src="../uploads/no-image.png" alt="No image" title="No image" width="200" height="150">
						</a>
					@endif
				</td>
		        <td>{!! $product->product_price !!}</td>
		        <td>{!! $product->product_description !!}</td>

		        <td><a href="<?php echo URL::to('/category') ?>/{{ $product->cate_id }}"> {!! $product->cate_id !!} </a></td>

		        <td width="150"><a href="{!! URL::to('/edit/'.$product->id) !!}">Edit</a> | <a href="{!! URL::to('/delete/'.$product->id) !!}" onclick="return checkDel()">Delete</a></td>
		      </tr>
			@endforeach

		    </tbody>
		</table>
	@else
	    <h2>Empty product</h2>
	@endif
@stop