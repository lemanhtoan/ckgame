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
			  <li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#">User
					  <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					  <?php if (Auth::check()) $user = Auth::user()->id;
					  if ( !Auth::check() ): ?>
					  <li><a href="<?php echo URL::to('/auth/login') ?>">Login</a></li>
					  <li><a href="<?php echo URL::to('/auth/register') ?>">Register</a></li>
					  <li><a href="<?php echo URL::to('/password/email') ?>">Reset Password</a></li>
					  <?php else: ?>
					  <li><a href="<?php echo URL::to('/auth/logout') ?>">Logout</a></li>
					  <li><a href='<?php echo URL::to("/user/$user") ?>'>Show profile</a></li>
					  <li><a href='<?php echo URL::to("/user/history") ?>'>Game history</a></li>
					  <?php endif; ?>
				  </ul>
			  </li>

			  <li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin Action
					  <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					  <li><a href="<?php echo URL::to('/users') ?>">Manager User</a></li>
					  <li><a href="<?php echo URL::to('/results') ?>">Manager Result</a></li>
				  </ul>
			  </li>

	      </ul>
	    </div>
	  </div>
	</nav>
</div>



