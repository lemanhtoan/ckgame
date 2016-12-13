 <!-- sidebar nav -->
<nav id="sidebar-nav">
    <ul class="nav nav-pills nav-stacked">
    	<?php
    	if (Auth::check()) $user = Auth::user()->id;    	
    	if ( !Auth::check() ): ?>
			<li><a href="<?php echo URL::to('/auth/login') ?>">Login</a>
			<li><a href="<?php echo URL::to('/auth/register') ?>">Register</a>
            <li><a href="<?php echo URL::to('/password/email') ?>">Reset Password</a>
		<?php else: ?>
			<li><a href="<?php echo URL::to('/auth/logout') ?>">Logout</a>
			<li><a href='<?php echo URL::to("/user/$user") ?>'>Show profile</a>
		<?php endif; ?>

        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
    </ul>
</nav>