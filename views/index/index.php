<div class="jumbotron">
	<div class="container">
		<h1>Welcome!</h1>
		<p>This is the main page.</p>
                <?php if (Session::get('loggedIn') == false):?>
		<p><a class="btn btn-primary btn-lg" href="<?php echo URL; ?>login" role="button">Login <i class="fa fa-user"></i></a></p>
                <?php endif; ?>
	</div>
</div>