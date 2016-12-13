<div class="navbar">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="{!! URL::to('/') !!}">Game check</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li class="{!! set_active('/') !!}"><a href="{!! URL::to('/') !!}">Home</a></li>
	        <li class="{!! set_active('new-product') !!}"><a href="{!! URL::to('/new-product') !!}">New product</a></li>
	        <li class="{!! set_active('products') !!}"><a href="{!! URL::to('/products') !!}">List products</a></li>
			<li class="{!! set_active('about') !!}"><a href="{!! URL::to('/about') !!}">About</a></li>
	        <li class="{!! set_active('contact') !!}"><a href="{!! URL::to('/contact') !!}">Contact</a></li>
	        <li class="{!! set_active('mcontact') !!}"><a href="{!! URL::to('/mcontact') !!}">Manager Contact</a></li>
	        <li class="{!! set_active('new-category') !!}"><a href="{!! URL::to('/new-category') !!}">New category</a></li>
	        <li class="{!! set_active('categories') !!}"><a href="{!! URL::to('/categories') !!}">List category</a></li>
	        <li class="{!! set_active('new-post') !!}"><a href="{{ url('/new-post') }}">Add post</a></li>
	        <li class="{!! set_active('upload') !!}"><a href="{{ url('/upload') }}">UploadCrop</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
</div>



