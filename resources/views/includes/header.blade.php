<div class="navbar">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="{!! URL::to('/') !!}">Game check</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
			<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Play Game
				  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
		  		@foreach ($data as $item)
				  <li><a href="<?php echo URL::to('/game') ?>/{{ $item->id }}">{!! $item->name !!}</a></li>
			    @endforeach
			  </ul>
			</li>
	        <li class="{!! set_active('new-product') !!}"><a href="{!! URL::to('/new-product') !!}">New product</a></li>
	        <li class="{!! set_active('products') !!}"><a href="{!! URL::to('/products') !!}">List products</a></li>
			<li class="{!! set_active('about') !!}"><a href="{!! URL::to('/about') !!}">About</a></li>
	        <li class="{!! set_active('contact') !!}"><a href="{!! URL::to('/contact') !!}">Contact</a></li>
	        <li class="{!! set_active('play') !!}"><a href="{{ url('/play') }}">Play All</a></li>
			<li class="{!! set_active('gametype') !!}"><a href="{{ url('/gametype') }}">Game Type</a></li>
			<li class="{!! set_active('gameclone') !!}"><a href="{{ url('/gameclone') }}">Game Clone</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
</div>



