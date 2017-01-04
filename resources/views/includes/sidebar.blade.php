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
        <?php if (preg_match("/\/(\d+)$/", $_SERVER['REQUEST_URI'], $matches) != 0) : if ( preg_match("/\/(\d+)$/", $_SERVER['REQUEST_URI'], $matches) ) $uId = $matches[1]; ?>
        <li><a href="<?php echo URL::to('/payUser/') ?>/<?php echo $uId; ?>">Set Money</a></li>
        <li><a href="<?php echo URL::to('/minusUser/') ?>/<?php echo $uId; ?>">Get Money</a></li>
        <li><a href="<?php echo URL::to('/userhistory/') ?>/<?php echo $uId; ?>">Game History</a></li>
        <?php endif; ?>
    </ul>
</nav>