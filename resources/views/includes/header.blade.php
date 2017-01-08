<div class="navbar">
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="{!! URL::to('/') !!}">Game check</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
			<?php if (( !Auth::check() ) or ( (Auth::check() && $user = Auth::user()->id != 1)))  :  ?>
			<li class="{!! set_active('about') !!}"><a href="{!! URL::to('/about') !!}">About</a></li>
	        <li class="{!! set_active('contact') !!}"><a href="{!! URL::to('/contact') !!}">Contact</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Play Game
						<span class="caret"></span></a>
					<ul class="dropdown-menu">
						@foreach ($data as $item)
							<li><a href="<?php echo URL::to('/game') ?>/{{ $item->id }}">{!! $item->name !!}</a></li>
						@endforeach
					</ul>
				</li>

			<?php endif;  ?>
				<li class="{!! set_active('gamehis') !!}">
					<a href="{!! URL::to('/historygame') !!}">Find History Result</a>
				</li>

			<?php if (Auth::check()) : $user = Auth::user()->id; if ($user == 1):  ?>
			<li class="{!! set_active('gametype') !!}"><a href="{{ url('/gametype') }}">Game Type</a></li>
			<li class="{!! set_active('gameclone') !!}"><a href="{{ url('/gameclone') }}">Game Clone</a></li>

			  <li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin Action
					  <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					  <li><a href="<?php echo URL::to('/users') ?>">Manager User</a></li>
					  <li><a href="<?php echo URL::to('/results') ?>">Manager Result</a></li>
				  </ul>
			  </li>
			<?php endif; endif; ?>

			  <li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					  <?php if (Auth::check()) {
						  $user = "User (<b class='green'>".Auth::user()->name."</b>)";
					  } else {
						  $user = "User";
					  }
					  echo $user;
					  ?>
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
					  <li><a href='<?php echo URL::to("/user/historymoney/$user") ?>'>Money history</a></li>
					  <?php endif; ?>
				  </ul>
			  </li>
	      </ul>
	    </div>
	  </div>
	</nav>
</div>




